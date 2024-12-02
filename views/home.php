<?php session_start() ?>
<div class="events-body">

   <h1>Look at all these events !</h1>
   <div class="events-container">
      <?php for ($i = 0; $i <= 19; $i++): ?>
         <div class="event-card">
            <img src="https://picsum.photos/seed/picsum/300/200" alt="">
            <div class="card-content">
               <h3>Event Name</h3>
               <p>Event Date</p>
            </div>
            <div class="card-description">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum magnam repellat cum culpa saepe dolorum!
                  Asperiores odio animi facere autem neque, voluptates maxime non ducimus, dolor id quod perspiciatis
                  omnis.
               </p>
            </div>
            <div class="card-footer">
               <span class="badge">143</span>
               <a href="">
               </a><button class="btn-details">Details</button>

               <p>Organizers Name</p>
            </div>
         </div>
      <?php endfor; ?>
   </div>
</div>