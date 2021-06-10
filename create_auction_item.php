<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Opret auktion</title>
   </head>
   <body>
     <h1>Opret item</h1>
     <form class="" action="create_auction.php" method="post" enctype="multipart/form-data">
       <label for="">Titel:</label><br>
       <input type="text" name="title" value="" placeholder="Titel" required> <br><br>
       <label for="">Beskrivelse:</label><br>
       <input type="text" name="description" value="" placeholder="Beskrivelse" required> <br><br>
       <label for="">Billede:</label><br>
       <input type="file" name="image" value="" required> <br><br>
       <label for="">Kategori:</label><br>
       <select id="category_id" name="category_id">
         <?php foreach(select_category() as $category) { ?>
         <option value="<?php echo $category['id']; ?>">
           <?php echo $category['category']; ?>
         </option>
         <?php } ?>
       </select><br><br>
       <button type="submit" name="create_item_button">Opret produkt</button>
     </form>
   </body>
 </html>
