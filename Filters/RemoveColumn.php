<?php

namespace src\Filters;

use src\Controller;

class RemoveColumn extends Controller
{
	protected $tag = 'manage_users_columns';

	public function handler($column = null)
	{
		unset($column['posts']);
		return $column;
	}
}
