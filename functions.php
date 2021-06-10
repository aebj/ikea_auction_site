<?php
// Definerer konstanter med database forbindelse info
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'root');
define('DBNAME', 'ikea_auction_site');

$conn = null;

global $conn;

// Opretter den faktiske database forbindelse
$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

// Tester om der er fejl i databaseforbindelse (Stopper eksekvering)
if(!$conn) {
  die("Forbindelsen fejlede" . mysqli_error($conn));
}

/*function active_auctions() {
  global $conn;
  $sql = "SELECT auctions.id, items.image, items.title, auctions.expiration, MAX(bids.amount) AS highest_bid
FROM auctions
JOIN items
ON auctions.items_id = items.id
JOIN bids
ON bids.auctions_id = auctions.id
GROUP BY auctions_id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
      <td>". $row["image"] ."</td>
      <td>". $row["title"] ."</td>
      <td>". $row["expiration"] ."</td>
      <td>". $row["highest_bid"] ."</td>
      </tr>";
    }
    echo "</table>";
  }
  else {
    echo "0 result";
  }
}*/




/*
function homepage_auctions() {
  global $conn;
  $sql = "SELECT auctions.id, items.image, items.title, auctions.expiration
  FROM auctions
  JOIN items
  ON auctions.items_id = items.id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>
       <td>'.$row['image'].'</td><br>
       <td>'.$row['title'].'</td><br>
       <td>'. '<a href="single_auction.php?aucid='.$row['id'].'">see info here</a>'.'</td><br>
     </tr>';
    }
  }
}*/


function profile_auction() {
  global $conn;
  $sql = "SELECT items.title, auctions.expiration, MAX(bids.amount) AS highest_bid
  FROM items
  JOIN auctions
  ON auctions.items_id = items.id
  JOIN bids
  ON bids.auctions_id = auctions.id
  GROUP BY auctions_id";

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>
       <td>'.$row['title'].'</td>
       <td>'.$row['expiration'].'</td>
       <td>'.$row['highest_bid'].'</td>
       </tr>';
    }
  }
}

function select_category(){
  global $conn;
  $sql = "SELECT id, category FROM categories";
  $result = mysqli_query($conn, $sql);
  $dropdown_category = [];
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $dropdown_category[] = $row;
    }
}
return $dropdown_category;
}
//debug funktion til at tjekke data på en variable
function debug($data) {
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}
