<?php

namespace src\AdminPages;

use src\Controller;
use src\DBManager\DBManager;
use src\DBManager\Tables\Product;

class Products extends Controller
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

		if ($_GET['remove']) {
			$product = $em->find('src\DBManager\Tables\Product', $_GET['remove']);
			$em->remove($product);
			$em->flush();
		}
		wp_enqueue_style('datatable', '//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css');
		wp_enqueue_script('datatable', '//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js');
		$this->enqueueScript('product-pagination');
		$products = $em->getRepository('src\DBManager\Tables\Product')->findAll();
		$this->renderHTML('AdminPages/product-panel', ['backButton' => get_permalink(), 'adminURL' => admin_url('?page=user-data'), 'products' => $products]);
	}

	public function modifyProduct($id, $em)
	{
		$countriesTea = $em->getRepository('src\DBManager\Tables\Country')->findBy(['type' => 'tea'], ['name' => 'ASC']);
		$countriesCoffee = $em->getRepository('src\DBManager\Tables\Country')->findBy(['type' => 'coffee'], ['name' => 'ASC']);
		$brewTime = array('1-3 min', '3-5 min', '5-7 min');
		$teaTypes = array('Biała', 'Czarna', 'Pu-erh', 'Rooibos', 'Ulung', 'Zielona');
		$coffeeTypes = array('Arabica','Liberika', 'Robusta');
		$weight = array('50g', '150g', '250g');
		$grind = array('Drobne', "Średnie", "Grube");
		$brewQuantity = array(1, 2, 3, 5);
		$type = '';

		if ($id != 0) {
			$product = $em->find('src\DBManager\Tables\Product', $id);
			$type = $product->getType();
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
			'backButton' => 'http://multi.localhost/wp-admin/admin.php?page=user-data',
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
			if(is_uploaded_file($imageTemp)) {
				move_uploaded_file($imageTemp, $path . $imageName);
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
		
				$product->setsmokeDate($_POST['smokeDate'] == '' ? null : $_POST['smokeDate']);
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
