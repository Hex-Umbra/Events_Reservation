<?php
session_start();
require_once "../../database/connexion.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    //Verification des données transmises et filtré
    $username = filter_var($_POST["username"] ?? "", FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"] ?? "", FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $role = "user";

    //Email Validation
    //Check if email is already in use
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result) {
        $errors[] = "L'email est déjà utilisé";
    }
}
//Password Validation
if (strlen($password) < 8) {
    $errors[] = "Le mot de passe doit contenir au moins 8 caractères";
}

//If no errors , proceed with registration
if (empty($errors)) {
    //Hashing password
    try {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (name, email, password, role) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$username, $email, $hashed_password, $role])) {
            //Start Session and set user data
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $role;

            //Redirection
            header("Location:../?page=home");
            exit();
        }
    } catch (PDOException $e) {
        $errors[] = $e->getMessage() . "Registration failed, please try again";
    }
}
//If errors, display them
if (!empty($errors)) {
    $message = implode("<br>", $errors);
    echo $message;
    // header("Location:../?page=register");
    exit();
}
