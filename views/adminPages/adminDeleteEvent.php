<?php
// We check if the one accessing the page is an admin
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header('Location: ./?page=home');
    exit; // Stop further script execution after the redirect
}

if (isset($_GET["id_event"])) {
    $id_event = $_GET["id_event"];
} else {
    echo "Error: id_event not found";
}
$event = $eventController->getEventById($id_event);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($eventController->deleteEvent($id_event)) {
        $successMessage = "Event deleted successfully";
        $_SESSION["successMessage"] = $successMessage;
        header('Location: ./?page=home');
        exit;
    }
}
?>

<section class="delete-section">
    <h2>Are you sure you want to delete the Event: <span class="delete-warning"><?= $event["name"] ?></span></h2>
    <p>There is still : <?= $event["places_available"] ?> places available for this event</p>
    <div class="delete-choices">
        <form action="" method="POST">
            <button class="delete-buttons">Yes</button>
        </form>
        <a href="./?page=home">No</a>
    </div>
</section>