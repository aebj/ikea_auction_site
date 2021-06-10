<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/profile.css">
     <title>Profil</title>
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
       <li>Brugernavn</li>
       <ul><?php echo $row['username']; ?> </ul>
       <li>Fornavn</li>
       <ul><?php echo $row['first_name']; ?> </ul>
       <li>Efternavn</li>
       <ul><?php echo $row['last_name']; ?> </ul>
       <li>Telefonnummer</li>
       <ul><?php echo $row['phone_no']; ?> </ul>
       <li>E-mail</li>
       <ul><?php echo $row['email']; ?> </ul>
     </div>
     <div class="profile_data">

    </div>

Her kan den enkelte bruger se et overblik over ens profil samt aktive og vundne auktioner
<?php
}

}
?>
   </body>
 </html>
