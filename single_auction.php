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
     $sql = "SELECT auctions.id, auctions.created_at, auctions.created_by_users_id, auctions.expiration, auctions.minimum_price, items.description, items.image, items.title
     FROM auctions
     JOIN items
     ON items.id = auctions.items_id
     WHERE auctions.id ='$id'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) { ?>
        <img src="images/<?php echo $row['image'] ?>" alt="Billede mangler">
        <p>Minimums pris: <?php echo $row['minimum_price'] ?></p>
        <p><?php echo $row['description'] ?></p>
        <h1><?php echo $row['title'] ?></h1>
          <?php
            $countdown = strtotime($row['expiration']);
            //remaining tælles i sekunder
            $remaining = $countdown - time();
            // floor afrunder til heltal
            $days_remaining = floor($remaining / 86400);
            $hours_remaining = floor(($remaining % 86400) / 3600);
            $minutes_remaining = floor((($remaining % 86400) % 3600) / 60);
          ?>
          <h2><?php echo "Auktion slutter om " . $days_remaining . " dage, " . $hours_remaining . " timer og " . $minutes_remaining . " minuter" ?></h2>
          <h3>Slut dato: <?php echo $row['expiration'] ?></h3>
        <form class="" action="single_auction.php?aucid=<?php echo $_GET['aucid'] ?>" method="post">
          <input type="number" name="bid_amount" value="" placeholder="Give bud her">
          <button type="submit" name="bid_button">Giv bud</button>
          <?php
          $username = $_SESSION['username'];
          $sql_query = "SELECT id, username FROM users WHERE username='$username'";
          $result = mysqli_query($conn, $sql_query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              if (isset($_POST['bid_button'])) {
                if (!empty($_POST['bid_amount'])) {
                  $bid_amount = $_POST['bid_amount'];
                  debug($bid_amount);
                  $user_id = $row['id'];
                  $sql = "INSERT INTO bids (id, amount, created_at, auctions_id, users_id) VALUES (NULL, '$bid_amount', CURRENT_TIMESTAMP, '$id', '$user_id')";
                  $run = mysqli_query($conn, $sql);
                } else {
                  echo "Kan ikke være tom";
                }
              }
            }
          }
          ?>
        </form>
        <h3>Tidligere bud</h3>
          <table>
            <th>Bud</th>
            <th>Tidspunkt</th>
            <?php
            $sql = "SELECT id, amount, created_at, auctions_id FROM bids WHERE auctions_id = $id ORDER BY created_at DESC";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                 <td>'.$row['amount'].'</td>
                 <td>'.$row['created_at'].'</td><br>
               </tr>';
              }
            }
            ?>
        </table>
    <?php
      }
    }
    ?>
   </body>
 </html>
