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
       <?php

       $sql = "SELECT auctions.id, items.image, items.title, auctions.expiration
       FROM auctions
       JOIN items
       ON auctions.items_id = items.id";
       $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) { ?>
           <div class="main_content">
           <img src="images/<?php echo $row['image'] ?>">
           <h2><?php echo $row['title']; ?></h2>
           <p><?php echo $row['expiration'] ?></p>
           <a href="single_auction.php?aucid= <?php echo $row['id']?>">Se mere information her</a><br>
           </div>
            <?php
          }
        }
        ?>




     <?php include('template/footer.php'); ?>
   </body>
 </html>
