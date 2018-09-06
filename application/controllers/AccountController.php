<?php

namespace Application\Controllers;

use Application\Core\Controller;

class AccountController extends Controller
{

	public function actionLogin()
	{
		$this->view->twigLoad("login", []);
	}

	public function register()
	{
		echo "actionRegister run";
	}

	public function actionAuthorize()
	{

		$result = [];


		$requestParameters = json_decode(file_get_contents("php://input"));
		if (property_exists($requestParameters, "login") && property_exists($requestParameters, "password")) {
			$result = [
				"result" => "error",
				"message" => "Поля Логин и Пароль не могут быть путыми",
				"errors" => "Invalid request data;"
			];

			if (!is_null($requestParameters->login) && !is_null($requestParameters->password)) {

			}

			$result = [
				"result" => "error",
				"message" => "Поля Логин и Пароль не могут быть путыми",
				"errors" => $result["errors"] . "fields null exceptions;"
			];


		} else {
			echo $result;
		}
	}
}
