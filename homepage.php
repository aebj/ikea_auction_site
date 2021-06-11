<?php

include('functions.php');
include('template/navbar.php');


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/homepage.css">
     <title>Forside</title>
   </head>
   <body>
     <main>
       <?php
       $sql = "SELECT auctions.id, items.image, items.title, auctions.expiration
       FROM auctions
       JOIN items
       ON auctions.items_id = items.id";
       $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) { ?>
           <div id="product-container">
               <img src="images/<?php echo $row['image'] ?>">
               <h2><?php echo $row['title']; ?></h2>
               <p><?php echo $row['expiration'] ?></p>
               <a href="single_auction.php?aucid= <?php echo $row['id']?>">Se mere information her</a>
            </div>
          </main>
          <?php
        }
      }
      ?>
     <?php include('template/footer.php'); ?>
   </body>
 </html>
