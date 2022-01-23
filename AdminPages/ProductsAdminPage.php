<?php

namespace src\AdminPages;

use DateTime;
use src\Controller;
use src\DBManager\DBManager;
use src\DBManager\Tables\Product;

class ProductsAdminPage extends Controller
{
	public function register()
	{
		add_menu_page(
			'Produkty',
			'Produkty',
			'manage_options',
			'user-data',
			array($this, 'handler'),
		);
	}

	public function handler()
	{
		$DBManager = new DBManager();
		$em = $DBManager->entityManager;
		
		if ($_POST && !isset($_GET['edit'])) {
			$this->addToDB(null, $em);
			return;
		}

		if (isset($_GET['edit'])) {
			$this->modifyProduct($_GET['edit'], $em);
			return;
		}

		if (isset($_GET['remove'])) {
			$product = $em->find('src\DBManager\Tables\Product', $_GET['remove']);
			$orderPosition = $em->getRepository('src\DBManager\Tables\OrderPosition')->findBy(['productId' => $product->getId()]);
			if (empty($orderPosition)) {
				$em->remove($product);
				$em->flush();
			}
		}
		wp_enqueue_style('datatable', '//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css');
		wp_enqueue_script('datatable', '//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js');
		$this->enqueueScript('product-pagination');
		$products = $em->getRepository('src\DBManager\Tables\Product')->findAll();
		$this->renderHTML('AdminPages/product-panel', ['backButton' => 'http://po.apache:8081/wp-admin/admin.php?page=user-data', 'adminURL' => admin_url('?page=user-data'), 'products' => $products]);
	}

	public function modifyProduct($id, $em)
	{
		$countriesTea = $em->getRepository('src\DBManager\Tables\Country')->findBy(['type' => 'tea'], ['name' => 'ASC']);
		$countriesCoffee = $em->getRepository('src\DBManager\Tables\Country')->findBy(['type' => 'coffee'], ['name' => 'ASC']);
		$brewTime = array('1-3 min', '3-5 min', '5-7 min');
		$teaTypes = array('Biała', 'Czarna', 'Pu-erh', 'Rooibos', 'Ulung', 'Zielona');
		$coffeeTypes = array('Arabica','Liberika', 'Robusta');
		$weight = array('50', '150', '250');
		$grind = array('Drobne', "Średnie", "Grube");
		$brewQuantity = array(1, 2, 3, 5);
		$type = '';

		if ($id != 0) {
			$product = $em->find('src\DBManager\Tables\Product', $id);
			$type = $product->getType();
			$weight = array($product->getWeight());
		} else {
			$product = new Product();
		}
		
		if ($_POST) {
			$this->addToDB($id, $em);
			return;
		}
		
		$this->enqueueScript('switch-product');
		$this->renderHTML('AdminPages/product-data', array(
			'countriesTea' => $countriesTea,
			'countriesCoffee' => $countriesCoffee,
			'product' => $product,
			'backButton' => 'http://po.apache:8081/wp-admin/admin.php?page=user-data',
			'productType' => $type,
			'brewQuantity' => $brewQuantity,
			'brewTime' => $brewTime,
			'teaTypes' => $teaTypes,
			'weight' => $weight,
			'coffeeTypes' => $coffeeTypes,
			'grind' => $grind,
			'id' => $id,
		));
	}

	public function addToDB($id, $em)
	{
		if ($id != 0) {
			$product = $em->find('src\DBManager\Tables\Product', $id);
		} else {
			$product = $em->getRepository('src\DBManager\Tables\Product')->findBy(['title' => $_POST['name'], 'weight' => $_POST['weight']]);
			if (!empty($product)) {
				$this->renderHTML('message', ['message' => 'Produkt o danej wadze i nazwie już istnieje!', 'status' => 'danger']);
				return;
			}
			$product = new Product();
		}

		if (isset($_POST['name'])) {
			$product->setTitle($_POST['name']);
		}
		if (isset($_POST['description'])) {
			$product->setDescription($_POST['description']);
		}
		if (isset($_POST['quantity'])) {
			$product->setQuantity($_POST['quantity']);
		}
		if (isset($_POST['price'])) {
			$product->setPrice($_POST['price']);
		}
		if (isset($_POST['weight'])) {
			$product->setWeight($_POST['weight']);
		}
		if (isset($_POST['discount'])) {
			$product->setDiscount($_POST['discount']);
		}
		if ($_FILES) {
			$image = $_FILES['image'];
			$imageName = $image['name'];
			$imageTemp = $image['tmp_name'];
			$path = 'wp-content\plugins\po\assets\img\\';
			$absolutePath = 'C:\xampp\htdocs\wordpress_multisite\wp-content\plugins\po\assets\img\\';
			if(is_uploaded_file($imageTemp)) {
				move_uploaded_file($imageTemp, $absolutePath . $imageName);
				$product->setPath($path . $imageName);
			}
		}
		$product->setType($_POST['switch']);
		if ($_POST['switch'] == 'tea') {
			$product->setIdCountry($_POST['teaCountry']);
			$product->setKind($_POST['teaType']);
			if (isset($_POST['brewQuantity'])) {
				$product->setBrewQuantity($_POST['brewQuantity']);
			}
			if (isset($_POST['brewTime'])) {
				$product->setBrewTime($_POST['brewTime']);
			}
		} else {
			$product->setKind($_POST['coffeeType']);
			$product->setIdCountry($_POST['coffeeCountry']);
			if (isset($_POST['grind'])) {
				$product->setGrind($_POST['grind']);
			}
			if (isset($_POST['smokeDate'])) {
				$product->setsmokeDate($_POST['smokeDate'] == '' ? null : new DateTime($_POST['smokeDate']));
			}
			if (isset($_POST['temperature'])) {
				$product->setTemperature($_POST['temperature']);
			}
		}
		$em->persist($product);
		$em->flush();

		$products = $em->getRepository('src\DBManager\Tables\Product')->findAll();
		$this->renderHTML('AdminPages/product-panel', ['backButton' => get_permalink(), 'adminURL' => admin_url('?page=user-data'), 'products' => $products]);
	}
}
