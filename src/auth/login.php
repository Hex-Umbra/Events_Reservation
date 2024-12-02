<?php
session_start();

$email = "admin@admin.com";
$password = "azerty";
$username = "Skyrim enjoyer";
$role = "admin";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($_POST['email'] == $email && $_POST['password'] == $password) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['username'] = $username;
            if ($role === "admin") {
                header('Location: ../?page=dashboard');
                exit();
            }
            header('Location: ../?page=home');
            exit();
        } 
    }

}


?>