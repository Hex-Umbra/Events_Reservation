<?php
session_start();
require_once "../database/connexion.php" ?>
<div class="events-body">

   <h1>Look at all these events !</h1>
   <div class="events-container">
      <?php
      $req = 
      "SELECT events.*, organisation.nom_org AS org_name FROM events 
      JOIN organisation 
      ON events.id_org = organisation.id_org";
      $stmt = $pdo->prepare($req);
      $stmt->execute();
      $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // var_dump( $events )
      ?>
      <?php foreach ($events as $event): ?>
         <div class="event-card">
            <img src=<?= $event["image_url"] ?>  alt="">
            <div class="card-content">
               <h3><?= $event['name'] ?></h3>
               <div>
                  <p><?= $event["date"] ?> </p>
                  <p><?= $event["lieu"] ?> </p>
               </div>
            </div>
            <div class="card-description">
               <p><?= $event["description"] ?>
               </p>
            </div>
            <div class="card-footer">
               <span class="badge"><?= $event["places_available"] ?> </span>
               <span><?= $event["price"] ?>€ </span>
               <a href="?page=event&id=<?= $event['id_event'] ?>">
                  Details
               </a>

               <p><?= $event["org_name"] ?> </p>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>