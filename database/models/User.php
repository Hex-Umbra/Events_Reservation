<!-- <?php

require_once "../connexion.php";
class User {
    private $db;

    public function create($name, $password, $email) {
        try {
            $sqlRequest = "INSERT INTO users (name, email, password) VALUE (?,?,?)";
            $stmt = $pdo->prepare($sqlRequest);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
} -->