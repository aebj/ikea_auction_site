<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

if (isset($_POST['create_user_button'])) {
  $username = $_POST['username'];
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $phone_no = $_POST['phone_no'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql_query = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `password`) VALUES (NULL, '$firstname', '$lastname', '$username', '$phone_no', '$email', '$password')";
  $run = mysqli_query($conn, $sql_query) or die();
  header('location: login.php');
}
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Opret bruger</title>
   </head>
   <body>
     <h1>Opret bruger</h1>
     <form class="" action="signup.php" method="post">
       <label for="">Brugernavn:</label><br>
       <input type="text" name="username" value="" placeholder="Bugernavn" required> <br><br>
       <label for="">Fornavn:</label><br>
       <input type="text" name="fname" value="" placeholder="Fornavn" required> <br><br>
       <label for="">Efternavn:</label><br>
       <input type="text" name="lname" value="" placeholder="Efternavn" required> <br><br>
       <label for="">Mobilnummer:</label><br>
       <input type="number" name="phone_no" value="" placeholder="Mobilnummer" required> <br><br>
       <label for="">Email:</label><br>
       <input type="email" name="email" value="" placeholder="Email adresse" required> <br><br>
       <label for="">Adgangskode:</label><br>
       <input type="password" name="password" value="" placeholder="Adgangskode" required> <br><br>
       <button type="submit" name="create_user_button">Opret bruger</button>
     </form>
   </body>
 </html>
