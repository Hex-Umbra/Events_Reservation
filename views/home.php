<?php

$admin_event_style = "";
if (isset($_SESSION["role"])) {
   if ($_SESSION["role"] === "admin") {
      $admin_event_style = "./public/styles/adminEvents.css";
   }
}
?>
<link rel="stylesheet" href=<?= $admin_event_style ?>>
<div class="events-body">

   <div class="events-container">
      <?php
      $req =
         "SELECT events.*, organisation.nom_org AS org_name FROM events 
      JOIN organisation 
      ON events.id_org = organisation.id_org
      ORDER BY events.date ASC";
      $stmt = $pdo->prepare($req);
      $stmt->execute();
      $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <?php foreach ($events as $event): ?>
         <div class="event-card">
            <img src=<?= $event["image_url"] ?> alt="">
            <div class="card-content">
               <h3><?= $event['name'] ?></h3>
               <div>
                  <p><?= $event["date"] ?> </p>
                  <p><?= substr($event["time"], 0, 5) ?> </p>
                  <p><?= $event["location"] ?> </p>
               </div>
            </div>
            <div class="card-description">
               <p><?= $event["description"] ?>
               </p>
            </div>
            <div class="card-footer">
               <span class="badge">Places: <?= $event["places_available"] ?> </span>
               <span class="badge"><?= $event["price"] ?>€ </span>
               <a href="?page=event&id=<?= $event['id_event'] ?>">
                  More Details
               </a>

            </div>
            <p class="org-name"><?= $event["org_name"] ?> </p>
            <form action="" method="POST" class="">
               <button type="submit" class="btn-primary">Book now</button>
            </form>
         </div>
      <?php endforeach; ?>


   </div>
</div>