<?php

require_once __DIR__ . "/../models/User.php";

class UserController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new User($db);
    }

    public function addUser($name, $password, $email, $role)
    {
        $this->userModel->createUser($name, $password, $email, $role);
    }
}