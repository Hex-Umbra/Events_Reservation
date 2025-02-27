<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $controller = new UserController($pdo);

    $errors = [];

    // All fields are required and checked for validation
    $username = htmlspecialchars($_POST["username"] ?? "", ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST["email"] ?? "", FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $role = "user";

    // Add User to the database
    if ($controller->addUser($username, $password, $email, $role)) {
        // If user is successfully add, add his credentials to the session
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["role"] = $role;
        header("Location: ../../index.php");
    }
}




