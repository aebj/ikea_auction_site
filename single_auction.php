<?php

include('functions.php');
include('template/navbar.php');

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/single_auction.css">
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
        <div class="right">
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
            <?php
              $sql_query = "SELECT auctions.id, items.image, items.title, auctions.expiration, MAX(bids.amount) AS highest_bid
              FROM auctions
              JOIN items
              ON auctions.items_id = items.id
              JOIN bids
              ON bids.auctions_id = auctions.id
              WHERE auctions.id = '$id'
              GROUP BY auctions_id";
              $result = mysqli_query($conn, $sql_query);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $highest_bid = $row['highest_bid'];
                }
              }
            ?>
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
                    if ($_POST['bid_amount'] > $highest_bid) {
                      $bid_amount = $_POST['bid_amount'];
                      $user_id = $row['id'];
                      $sql = "INSERT INTO bids (id, amount, created_at, auctions_id, users_id) VALUES (NULL, '$bid_amount', CURRENT_TIMESTAMP, '$id', '$user_id')";
                      $run = mysqli_query($conn, $sql);
                    } else {
                      echo "Skal være højere end det sidste bud.";
                    }
                  }
                }
              }
            ?>
              </form>
              <h3 id = prev_bids_title>Tidligere bud</h3>
              <hr>
                <table class="prev_bids">
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
      </div>
<?php  }
  } ?>
    <?php include('template/footer.php'); ?>
   </body>
 </html>
