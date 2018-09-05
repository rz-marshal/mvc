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
}
