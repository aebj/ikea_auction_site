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





//debug funktion til at tjekke data på en variable
function debug($data) {
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}
