<?php

include('functions.php');
include('template/navbar.php');

if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];

   $file_ext=explode('.',$_FILES['image']['name']);
   $file_ext=end($file_ext);
   $file_ext=strtolower($file_ext);

   $extensions= array("jpeg","jpg","png");

   if(in_array($file_ext,$extensions)=== false){
      $errors[]="Udvidelse ikke tilladt. Vælg en JPEG- eller PNG-fil.";
   }

   if($file_size > 2097152){
      $errors[]='Filstørrelsen skal være mindre end 2 MB';
   }

   if(empty($errors)==true){
      move_uploaded_file($file_tmp,"images/".$file_name);
      echo "Oprettelse af item lykkedes";
   }else{
      print_r($errors);
   }
}

if (isset($_POST['create_item_button'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $category_id = $_POST['category_id'];

  $sql = "INSERT INTO `items` (`id`, `title`, `description`, `image`, `cat_id`) VALUES (NULL, '$title', '$description', '$file_name', '$category_id')";
  $run = mysqli_query($conn, $sql) or die();
  $last_id = mysqli_insert_id($conn);
}

if (isset($_POST['create_auction_button'])) {
  $min_price = $_POST['min_price'];
  $expiration = $_POST['expiration'];
  $items_id = $_POST['items_id'];
  $username = $_SESSION['username'];
  $sql = "SELECT id, username FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $user_id = $row['id'];
      $sql = "INSERT INTO `auctions` (`id`, `created_at`, `created_by_users_id`, `expiration`, `minimum_price`, `items_id`) VALUES (NULL, CURRENT_TIMESTAMP, '$user_id', '$expiration', '$min_price', '$items_id')";
      $run = mysqli_query($conn, $sql);
      header('Location: homepage.php');
    }
  }
}

?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/create_auction.css">
     <title>Opret auktion</title>
   </head>
   <body>
     <h1>Opret auktion</h1>
     <form class="" action="create_auction.php" method="post">
       <label for="">Minimums pris:</label><br>
       <input type="number" name="min_price" value="" placeholder="" required> <br><br>
       <label for="">Udløbstidspunkt:</label><br>
       <input type="datetime-local" name="expiration" value="" placeholder="Dato" required> <br><br>
       <input type="hidden" name="items_id" value="<?php echo $last_id ?>"> <br><br>
       <button type="submit" name="create_auction_button">Opret auktion</button>
     </form>
     <?php include('template/footer.php'); ?>
   </body>
 </html>
