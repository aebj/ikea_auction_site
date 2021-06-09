<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Signup</title>
   </head>
   <body>
     <h1>Opret bruger</h1>
     <form class="" action="index.html" method="post">
       <label for="">Brugernavn:</label><br>
       <input type="text" name="username" value="" placeholder="Bugernavn"> <br><br>
       <label for="">Fornavn:</label><br>
       <input type="text" name="fname" value="" placeholder="Fornavn"> <br><br>
       <label for="">Efternavn:</label><br>
       <input type="text" name="lname" value="" placeholder="Efternavn"> <br><br>
       <label for="">Mobilnummer:</label><br>
       <input type="text" name="phone_no" value="" placeholder="Mobilnummer"> <br><br>
       <label for="">Email:</label><br>
       <input type="text" name="email" value="" placeholder="Email adresse"> <br><br>
       <label for="">Adgangskode:</label><br>
       <input type="password" name="password" value="" placeholder="Adgangskode"> <br><br>
       <button type="submit" name="button">Opret bruger</button>
     </form>
   </body>
 </html>
