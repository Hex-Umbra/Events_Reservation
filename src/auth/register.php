<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = "user";

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (isset($email) && isset($username)) {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $role;
        }
        header("Location: ../?page=home");
    } else {
        header("Location: ../?page=register");
    }

}

?>