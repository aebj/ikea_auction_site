<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

debug($_SESSION['username']);

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Forside</title>
   </head>
   <body>
     <div class="main_content">
       <?php homepage_auctions(); ?>


     </div>
     <?php include('template/footer.php'); ?>
   </body>
 </html>
