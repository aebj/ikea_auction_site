<?php

include('functions.php');
include('template/navbar.php');

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
            }
            else {
              echo "Fejl i brugernavn eller adgangskode";
            }
          }
        }
      ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/login.css">
     <title>Log ind</title>
   </head>
   <body>
     <div class="container">
       <form method="post" action="">
          <div class="login">
            <h1>Log ind</h1>
              <div>
                <input type="text" name="username" placeholder="Brugernavn">
              </div> <br>
              <div>
                <input type="password" name="password" placeholder="Adgangskode">
              </div> <br>
              <div>
                <button type="submit" value="Log ind" name="login_button">Log ind</button>
              </div>
            </div><br>
            <lu>Mangler du en bruger?</lu><br>
            <a href="signup.php">Opret bruger her</a>
          </form>

        </div>
        <?php include('template/footer.php'); ?>
      </body>
    </html>
