<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

 if(isset($_POST['login_button'])){

     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $password = mysqli_real_escape_string($conn, $_POST['password']);

     if ($username != "" && $password != ""){

         $sql_query = "SELECT id, username, password FROM users WHERE username = '".$username."' AND password = '".$password."'LIMIT 1";
         $result = mysqli_query($conn,$sql_query);
         $row = mysqli_fetch_array($result);

           if($result && mysqli_num_rows($result) > 0){
               $_SESSION['username'] = $username;
               header('Location: homepage.php');
               die();
           } else{
               echo "Fejl i brugernavn eller adgangskode";
             }
     }
 }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     Her logger man ind
   </body>
 </html>
