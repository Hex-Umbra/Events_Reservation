<?php
if (isset($_GET["id_event"])) {
    $id_event = $_GET["id_event"];
    $event = $eventController->getEventById($id_event);
}

?>

<div class="event-body">
    <div class="event-container">
        <div class="left-side">
            <img src="<?= $event["image_url"] ?>" alt="">
            <h1><?= $event["name"] ?></h1>
            <h2><?= $event["id_org"] ?></h2>
        </div>
        <div class="right-side">
            <div class="description">
                <h3>Description</h3>
                <p><?= $event["description"] ?></p>
            </div>
            <div class="details">
                <p>
                    Date: <span><?= $event["date"] ?></span>
                </p>
                <p>
                    Heure: <span><?= $event["time"] ?></span>
                </p>
                <p>
                    Adresse:<span> <?= $event["location"] ?></span>
                </p>
                <p>
                    Places Restantes: <span><?= $event["places_available"] ?></span>
                </p>
                <p>
                    Prix: <span><?= $event["price"] ?></span>
                </p>
                <?php if (!isset($_SESSION["role"])): ?>
                    <p>
                        Si vous voulez participer a cet événement veuillez vous connecter
                    </p>
                <?php else: ?>
                    <form action=""><input type="submit" value="Participer"></form>
                <?php endif; ?>

            </div>
        </div>
    </div>

</div>