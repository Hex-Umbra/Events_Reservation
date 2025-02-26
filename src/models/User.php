<?php
class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Create a new user
    public function createUser($name, $password, $email, $role)
    {
        try {
            $sqlRequest = "INSERT INTO users (name, email, password, role) VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sqlRequest);
            if ($stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $role])) {
                return $stmt->rowCount();// Return the number of rows affected
            }
            return false; // Return false if the query failed

        } catch (\Throwable $th) {
            return false; // Return false if an error occurs
        }
    }
}