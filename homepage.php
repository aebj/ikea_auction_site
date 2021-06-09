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
     <title></title>
   </head>
   <body>
     <div class="main_content">
       <?php active_auctions() ?>
     </div>
     <div>
       </div>
     <?php } ?>
   </body>
 </html>
