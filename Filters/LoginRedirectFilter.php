<?php

namespace src\Filters;

use src\Controller;

class LoginRedirectFilter extends Controller
{
	protected $tag = 'login_redirect';

	public function handler()
	{
		return "http://po.apache:8081/";
	}
}
