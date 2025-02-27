<?php

require_once __DIR__ . "/../models/User.php";

class UserController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new User($db);
    }

    public function createUser($name, $password, $email, $role): mixed
    {
        return $this->userModel->createUser($name, $password, $email, $role);
        
    }

    public function checkUser($email, $password): mixed{
        return $this->userModel->checkUser($email, $password);
    }

    public function getAllUsers(): mixed{
        return $this->userModel->getAllUsers();
    }
}