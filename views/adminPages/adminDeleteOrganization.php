<?php
// We check if the one accessing the page is an admin
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header('Location: ./?page=home');
    exit; // Stop further script execution after the redirect
}

if (isset($_GET["id_org"])) {
    $id_org = $_GET["id_org"];
} else {
    echo "Error: id_org not found";
}
$organizer = $organizationController->getOrganizationById($id_org);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($organizationController->deleteOrganization($id_org)) {
        $successMessage = "Organizer deleted successfully";
        $_SESSION["successMessage"] = $successMessage;
        header('Location: ./?page=allOrganizers');
        exit;
    }
}
?>

<section class="delete-section">
    <h2>Are you sure you want to delete the Organizer: <div class="delete-warning"><?= $organizer["nom_org"] ?></></h2>
    <div class="delete-choices">
        <form action="" method="POST">
            <button class="delete-buttons">Yes</button>
        </form>
        <a href="./?page=allOrganizers">No</a>
    </div>
</section>