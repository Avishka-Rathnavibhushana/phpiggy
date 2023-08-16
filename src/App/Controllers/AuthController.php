<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};

class AuthController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private UserService $userService)
    {
    }

    public function RegisterView()
    {
        echo $this->view->render('register.php');
    }

    public function Register()
    {
        $this->validatorService->validateRegister($_POST);

        $this->userService->isEmailTaken($_POST['email']);

        $this->userService->create($_POST);

        redirectTo('/');
    }

    public function LoginView()
    {
        echo $this->view->render('login.php');
    }

    public function Login()
    {
        $this->validatorService->validateLogin($_POST);

        $this->userService->login($_POST);

        redirectTo('/');
    }
}
