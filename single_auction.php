<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Auktion</title>
   </head>
   <body>
     <?php
     $id = $_GET['aucid'];
     $sql = "SELECT id, created_at, created_by_users_id, expiration, minimum_price, items_id FROM auctions WHERE id='$id'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) { ?>
        <img src="" alt=""> <! title ->
        <p><?php echo $row ?></p> <! description ->

        <h1><?php echo $row ?></h1> <! title ->
        <h2><?php echo $row['expiration'] ?></h2><! expiration date or count down? ->
        <form class="" action="index.html" method="post">
          <input type="number" name="bid_button" value="" placeholder="Giv bud her">
          <button type="submit" name="button">Giv bud</button>
        </form>
        <h3>Tidligere bud</h3>


    <?php
      }
    }
    ?>
   </body>
 </html>
