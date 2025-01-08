<?php
require_once "../../database/connexion.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM user WHERE email = :email";
        } else {
            echo "This email is not valid";
        }
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new Exception("User not found");
        }
        if (!password_verify($password, $user['password'])) {
            throw new Exception("Password or email is incorrect");
        }

        $_SESSION['username'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        header('Location: ../?page=home');
        exit();
    } catch (Exception $e) {
        echo htmlspecialchars($e->getMessage());
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}



?>