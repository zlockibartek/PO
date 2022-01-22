<?php

namespace src\Shortcodes;

use src\Controller;
use src\DBManager\DBManager;
use src\DBManager\Tables\Address;

class UserPanel extends Controller
{
	public $tag = 'userPanel';
	public function handler()
	{
		$DBManager = new DBManager();
		$em = $DBManager->entityManager;

		$action = isset($_GET['action']) ? $_GET['action'] : '';

		switch ($action) {
			case 'address':
				$content = $this->personalData($em);
				$this->renderHTML('AdminPages/user-data', ['content' => $content, 'backButton' => 'http://multi.localhost/menu-uzytkownika/']);
				break;
			case 'password':
				$this->changePassword();
				$this->renderHTML('AdminPages/user-password', ['backButton' => 'http://multi.localhost/menu-uzytkownika/']);
				break;
			case 'history':
				$this->renderHTML('AdminPages/user-orders');
				break;
			case 'details':
				$this->renderHTML('AdminPages/order-details');
				break;
			default:
				$content = $this->personalData($em);
				$this->renderHTML('AdminPages/user-panel', ['content' => $content]);
				break;
		}
	}

	public function changePassword()
	{
		if ($_POST) {
			extract(($_POST));
			$user = wp_get_current_user();
			if ($user && wp_check_password($current, $user->data->user_pass, $user->ID) && $new == $repeat) {
				wp_set_password($new, $user->ID);
			}
		}
	}

	public function personalData($em)
	{
		$user = wp_get_current_user();
		$userId = get_current_user_id();
		$deliveryAddressId = get_user_meta($userId, 'delivery_address', true);
		$paymentAddressId = get_user_meta($userId, 'payment_address', true);
		$deliveryAddressId = $deliveryAddressId ?? 0;
		$paymentAddressId = $paymentAddressId ?? 0;
		$deliveryAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy(['id' => $deliveryAddressId])[0];
		$paymentAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy(['id' => $paymentAddressId])[0];
		$deliveryAddress = $deliveryAddress ?? new Address();
		$paymentAddress = $paymentAddress ?? new Address();

		if ($_POST) {
			wp_update_user([
				'ID' => $userId,
				'first_name' => $_POST['name'],
				'last_name' => $_POST['surname'],
				'phone' => isset($_POST['phone']) ? $_POST['phone'] : '',
			]);
			extract($_POST);

			if ($paymentCity && $paymentStreet && $paymentBuilding && $paymentPostal) {
				$paymentAddress->setTown($paymentCity);
				$paymentAddress->setStreet($paymentStreet);
				$paymentAddress->setBuilding($paymentBuilding);
				$paymentAddress->setPostalCode($paymentPostal);
				$paymentAddress->setApartament($paymentApartment);
				$em->persist($paymentAddress);
				$em->flush();
				update_user_meta($userId, 'payment_address', $paymentAddress->getId());
			}

			if ($deliveryCity && $deliveryStreet && $deliveryBuilding && $deliveryPostal) {
				$deliveryAddress->setTown($deliveryCity);
				$deliveryAddress->setStreet($deliveryStreet);
				$deliveryAddress->setBuilding($deliveryBuilding);
				$deliveryAddress->setPostalCode($deliveryPostal);
				$deliveryAddress->setApartament($deliveryApartment);
				$em->persist($deliveryAddress);
				$em->flush();
				update_user_meta($userId, 'delivery_address', $deliveryAddress->getId());
			}
		}

		$name = $user->user_name;
		$surname = $user->user_surname;
		$email = $user->user_email;
		$phone = get_user_meta($userId, 'phone', true);

		return compact('surname', 'email', 'phone', 'deliveryAddress', 'paymentAddress', 'name');
	}
}
