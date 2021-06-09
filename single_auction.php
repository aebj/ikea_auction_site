<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php
     $id = $_GET['aucid'];
     $sql = "SELECT id, created_at, created_by_users_id, expiration, minimum_price, items_id FROM auctions WHERE id='$id'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
         <td>". $row["minimum_price"] ."</td>
         <td>". $row["created_at"] ."</td>
         </tr>";
        }
      }
     ?>
   </body>
 </html>
