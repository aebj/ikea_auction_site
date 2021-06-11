<?php

include('functions.php');
include('template/navbar.php');

if ( isset( $_SESSION['username'] ) ) {
}
  else {
    header("Location: homepage.php");
  }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/profile.css">
     <title>Dine auktioner</title>
   </head>
   <body>
     <?php $username = $_SESSION['username'];
     $sql = "SELECT username, first_name, last_name, phone_no, email FROM users WHERE username = '$username'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
      ?>
     <h1>Din profil</h1>

     <div class="profile">
       <ul><strong>Brugernavn:</strong> <?php echo $row['username']; ?> </ul>
       <ul><strong>Fornavn:</strong> <?php echo $row['first_name']; ?> </ul>
       <ul><strong>Efternavn:</strong> <?php echo $row['last_name']; ?> </ul>
       <ul><strong>Telefonnummer:</strong> <?php echo $row['phone_no']; ?> </ul>
       <ul><strong>E-mail:</strong> <?php echo $row['email']; ?> </ul>
     </div>
     </table>
     <div class="profile_data">
       <h3 id = active_auctions>Aktive auktioner</h3>
        <table>
          <tr>
             <th>Titel<hr></th>
             <th>Udløbstidspunkt<hr></th>
             <th>Højeste bud<hr></th>
           </tr>
         <?php active_auctions(); ?>
       </table>
     </div>
    <?php } } ?>
    <?php include('template/footer.php'); ?>
   </body>
 </html>
