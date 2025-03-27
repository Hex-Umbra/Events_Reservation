<?php
class Organizations
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllOrganizers()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM organisation");
            $stmt->execute();
            $organizations = $stmt->fetchAll();
            return $organizations;
        } catch (\Throwable $th) {
            return ["error" => "There was an issue fetching the organizers from the database"];
        }
    }
    public function getOrganizerById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM organisation WHERE id_org = :id ");
            $stmt->execute(["id" => $id]);
            $organizer = $stmt->fetch();
            return $organizer;
        } catch (\Throwable $th) {
            return ["error" => "There was an issue fetching the organizer from the database"];
        }
    }

    public function createOrganizer($name, $email, $number)
    {
        try {
            //Sanitization of email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return ["error" => "Invalid email format"];
            }
            $stmt = $this->pdo->prepare("INSERT INTO organisation (nom_org, tel, email) VALUES (?,?,?) ");
            $stmt->execute([$name, $number, $email]);
            return ["success" => "Organizer created successfully"];
        } catch (\Throwable $th) {
            return ["error" => "There was an issue adding the organizer in the database"];
        }
    }

    public function deleteOrganizer($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM organisation WHERE id = :id ");
            $stmt->execute(["id" => $id]);
            return ["success" => "Organizer deleted successfully"];
        } catch (\Throwable $th) {
            return ["error" => "There was an issue deleting the organizer from the database"];
        }
    }
}