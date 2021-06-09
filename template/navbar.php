<?php

session_start()

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/navbar.css">
    <title></title>
  </head>
  <body>
    <div class="navbar">
      <a class="logo" href="homepage.php" >IKEA<br><br>Auktion</a>
      <div class="navbar-right">
        <a href="categories.php">Kategorier</a>
        <a href="create_auction.php">Opret auktion</a>
        <a href="profile.php">Dine auktioner</a>
        <?php if (isset($_SESSION['username'])): ?>
          <a href="logout.php">Log ud</a>
          <?php else: ?>
            <a href="login.php">Log ind</a>
        <?php endif; ?>
      </div>
    </div>
  </body>
</html>
