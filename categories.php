<?php

include('functions.php');
include('template/navbar.php');

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/homepage.css">
     <title>Kategorier</title>
   </head>
   <body>
     <div id="product-container">
       <form class="cat_dropdown" action="categories.php" method="post">
         <select class="" name="category">
           <?php foreach (select_category() as $dropdown_category) { ?>
             <option value="<?php echo $dropdown_category['id']; ?>">
              <?php echo $dropdown_category['category']; ?>
             </option>
           <?php } ?>
         </select>
         <button class="cat_button" type="submit" name="category_button">Vælg Kategori</button>
       </form>
       <?php
       if (isset($_POST['category_button'])) {
         $category_id = $_POST['category'];

       $sql = "SELECT auctions.id, items.image, items.title, auctions.expiration, categories.category
       FROM auctions
       JOIN items
       ON auctions.items_id = items.id
       JOIN categories
       ON categories.id = items.cat_id
       WHERE categories.id = '$category_id'";
       $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) { ?>
           <div id="product-container">
           <img src="images/<?php echo $row['image'] ?>">
           <h2><?php echo $row['title']; ?></h2>
           <p><?php echo $row['expiration'] ?></p>
           <a href="single_auction.php?aucid= <?php echo $row['id']?>">Se mere information her</a><br>
           </div>
            <?php
          }
        }
      } else {
        $sql = "SELECT auctions.id, items.image, items.title, auctions.expiration
        FROM auctions
        JOIN items
        ON auctions.items_id = items.id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <div id="product-container">
              <img src="images/<?php echo $row['image'] ?>">
              <h2><?php echo $row['title']; ?></h2>
              <p><?php echo $row['expiration'] ?></p>
              <a href="single_auction.php?aucid= <?php echo $row['id']?>">Se mere information her</a><br>
            </div>
             <?php
           }
         }
      }
        ?>




     <?php include('template/footer.php'); ?>
   </body>
 </html>
