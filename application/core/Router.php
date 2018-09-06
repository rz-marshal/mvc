<?php

namespace Application\Core;

use Exception;

class Router
{
	private $routes;
	private $filename;

	public function run($routes)
	{
		$this->routes = $routes;

		$controllerName = "Home";
		$actionName = "actionWelcome";

		if (!empty($routes[1])) {
			$controllerName = $routes[1];
		}

		if (!empty($routes[2])) {
			$actionName = "action" . ucfirst($routes[2]);
		}

		$this->filename = "application/controllers/" . ucfirst($controllerName) . "Controller.php";

		try {
			if (file_exists($this->filename)) {
				require_once $this->filename;
			} else {
				throw new Exception("File not found");
			}

			$className = 'Application\\Controllers\\' . ucfirst($controllerName) . "Controller";


			if (class_exists($className)) {
				$controller = new $className();
			} else {
				throw new Exception("File found but class not found");
			}
			if (method_exists($controller, $actionName)) {
				$controller->$actionName();
			} else {
				throw new Exception("Method not found");
			}
		} catch (Exception $e) {
			require_once(realpath("application/errors/404.php"));
		}
	}
}
