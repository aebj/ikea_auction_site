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

function active_auctions() {
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
}

function select_category() {
  global $conn;
//Vi laver en forespørgsel på id og type
  $sql = "SELECT id, category FROM categories";
  //Henter indholdet fra ovenstående
  $result = mysqli_query($conn, $sql);
  // Laver et tomt array
  $category = [];

  // Hvis mysqli er større end 0
  if (mysqli_num_rows($result) > 0) {
    // Databasen giver resultatet på forespørgelsen i $sql variablen
    while($row = mysqli_fetch_assoc($result)) {
      //Vi sikre at det kun er type og id som bliver vist
      $category[] = $row;
    }
  }

  return $category;
}

function user_data() {
  global $conn;
  $username = $_SESSION['username'];
  $sql = "SELECT username, first_name, last_name, phone_no, email FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
      <td>". $row["username"] ."</td>
      <td>". $row["first_name"] ."</td>
      <td>". $row["last_name"] ."</td>
      <td>". $row["phone_no"] ."</td>
      <td>". $row["email"] ."</td>
      </tr>";
    }
    echo "</table>";
  }
  else {
    echo "0 result";
  }
}

//debug funktion til at tjekke data på en variable
function debug($data) {
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}
