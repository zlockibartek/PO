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
				$this->renderHTML('AdminPages/user-data', ['content' => $content, 'backButton' => '/menu-uzytkownika/']);
				break;
			case 'password':
				$this->changePassword();
				$this->renderHTML('AdminPages/user-password', ['backButton' => '/menu-uzytkownika/']);
				break;
			case 'history':
				$orders = $this->getOrders($em);
				wp_enqueue_style('datatable', '//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css');
				wp_enqueue_script('datatable', '//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js');
				$this->enqueueScript('product-pagination');
				$this->renderHTML('AdminPages/user-orders', ['orders' => $orders, 'backButton' => '/menu-uzytkownika/']);
				break;
			default:
				$content = $this->personalData($em);
				$this->renderHTML('AdminPages/user-panel', ['content' => $content]);
				break;
		}
	}

	public function getOrders($em)
	{
		$orders = $em->getRepository('src\DBManager\Tables\OrderEntity')->findBy(['clientId' => get_current_user_id()]);
		return $orders;
	}

	public function changePassword()
	{
		if ($_POST) {
			extract(($_POST));
			$user = wp_get_current_user();
			if ($user && wp_check_password($current, $user->data->user_pass, $user->ID) && $new == $repeat) {
				wp_set_password($new, $user->ID);
				$this->renderHTML('message', ['message' => 'Hasło zaktualizowane pomyślnie', 'status' => 'success']);
				die();
			}
			$this->renderHTML('message', ['message' => 'Wprowadzone dane są nieprawidłowe', 'status' => 'danger']);
			die();
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
		$deliveryAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy(['id' => $deliveryAddressId]);
		$paymentAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy(['id' => $paymentAddressId]);
		$deliveryAddress = !empty($deliveryAddress) ? $deliveryAddress[0] : new Address();
		$paymentAddress = !empty($paymentAddress) ? $paymentAddress[0] : new Address();

		if ($_POST) {
			wp_update_user([
				'ID' => $userId,
				'first_name' => $_POST['username'],
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
			$this->renderHTML('message', ['message' => 'Dane zaktualizowane pomyślnie', 'status' => 'success']);
			die();
		}
		$name = get_user_meta($userId, 'first_name', true);
		$surname = get_user_meta($userId, 'last_name', true);
		$email = $user->user_email;
		$phone = get_user_meta($userId, 'phone', true);
		$nick = get_user_meta($userId, 'nickname', true);

		return compact('surname', 'email', 'phone', 'deliveryAddress', 'paymentAddress', 'name', 'nick');
	}
}
