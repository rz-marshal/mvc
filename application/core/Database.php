<?php

namespace Application\Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
	protected $connection;

	public  function  __construct()
	{
		$args = include APPLICATION_PATH . "/config/config.php";

		if ($this->connection == null) {

			$this->connection = new Capsule();

			$this->connection->addConnection([
			"driver" => $args['driver'],
			"host" => $args['host'],
			"database" => $args['name'],
			"username" => $args['user'],
			"password" => $args['pass'],
			"charset" => "utf8",
			"collation" => "utf8_unicode_ci",
			"prefix" => ""
		]);



			$this->connection->bootEloquent();


		}
	}


}