<?php

namespace Application\Controllers;

use Application\Core\Controller;
use Application\Models\User;

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

		if (!empty($_SESSION['user_id'])) {
			//пользователь авторизирован

			return null;
		}


		$requestParameters = json_decode(file_get_contents("php://input"));
		//проверка входных данных
		if (empty($requestParameters->login) || empty($requestParameters->password)) {
			$result = [
				"result" => "error",
				"message" => "Поля Логин и Пароль не могут быть путыми",
				"errors" => $result["errors"] . "fields null exceptions;"
			];
			echo json_encode($result);

			return null;
		}
		//проверка существования пользователя

		$user = User::where('login', '=', $requestParameters->login)->first();
		if ($user === null) {
			$result = [
				"result" => "error",
				"message" => "Поля Логин и Пароль не могут быть путыми",
				"errors" => "fields null exceptions;"
			];
			echo json_encode($result);
			return null;
		}
		if ($user->password == $requestParameters->password) {
			$result = [
				"result" => "error",
				"message" => "Поля Логин и Пароль не могут быть путыми",
				"errors" => $result["errors"] . "fields null exceptions;"
			];
			echo json_encode($result);
			return null;
		}
		$_SESSION['user_id'] = $user->id;


	}
}
