<?php

require_once __DIR__ . "/../models/Organizations.php";

class OrganizationsController
{

    private $organizationsModel;
    public function __construct($db)
    {
        $this->organizationsModel = new Organizations($db);
    }

    public function createOrganization($name, $phone, $email)
    {
        return $this->organizationsModel->createOrganizer($name, $email, $phone);
    }

    public function getOrganizations()
    {
        return $this->organizationsModel->getAllOrganizers();
    }

    public function getOrganizationById($id)
    {
        return $this->organizationsModel->getOrganizerById($id);
    }

    public function deleteOrganization($id){
        return $this->organizationsModel->deleteOrganizer($id);
    }
}

