<?php
require_once "../../database/connexion.php";
$controller = new UserController($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        //Checking if the email is correctly written (example@mail.com )
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM user WHERE email = :email";
        } else {
            echo "This email is not valid";
        }

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Checking if the user exists
        if (!$user) {
            throw new Exception("User not found");
        }
        if (!password_verify($password, $user['password'])) {
            throw new Exception("Password or email is incorrect");
        }

        // If the user exists and the password is correct, we start a session
        session_start();
        $_SESSION['username'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        header('Location: ../../?page=home');
        exit();
    } catch (Exception $e) {
        echo htmlspecialchars($e->getMessage());
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}



?>