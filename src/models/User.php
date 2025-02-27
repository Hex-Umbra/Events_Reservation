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
            // Email validation
            $emailCheckReq = "SELECT * FROM user WHERE email = :email";
            $stmt = $this->pdo->prepare($emailCheckReq);
            $stmt->execute([":email"=> $email]);
            $result = $stmt->fetch();
            if ($result) {
                return ["error" => "E-mail already in use"];
            }
            // Password Validation
            if (strlen($password) < 8) {
                return ["error" => "Password must be at least 8 characters long"];
            } else {
                //Hash password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            }

            // Insert user into database
            $sqlRequest = "INSERT INTO user (name, email, password, role) VALUES (?,?,?,?)";
            $stmt = $this->pdo->prepare($sqlRequest);
            if ($stmt->execute([$name, $email, $hashedPassword, $role])) {
                return $stmt->rowCount();// Return the number of rows affected
            }
            return ["error" => "Failed to add the new user"]; // Return false if the query failed

        } catch (\Throwable $th) {
            error_log($th->getMessage()); //Error message for debugging
            return ["error" => "Something went wrong when creating the new user"]; // Return false if an error occurs
        }
    }
}