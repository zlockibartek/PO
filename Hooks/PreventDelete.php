<?php

namespace src\Hooks;

use src\Controller;
use src\DBManager\DBManager;

class PreventDelete extends Controller {
	protected $tag = 'delete_user';

	public function handler($userId = null) {
		$DBManager = new DBManager();
		$em = $DBManager->entityManager;
		$result = $em->getRepository('src/DBManager/Tables/OrderEntity')->findBy(['clientId' => $userId]);
		if (!empty($result)) {
			$this->renderHTML('message', ['message' => "Wybrany użytkownik istnieje w zamówieniach, nie można go usunąć!", 'status' => 'danger']);
		}
		
	}
}