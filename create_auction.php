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
     <h1>Opret auktion</h1>
     <form class="" action="index.html" method="post"
     <label for="">Titel:</label><br>
     <input type="text" name="title" value="" placeholder="Titel"> <br><br>

     <label for="category_id">Kategori:</label><br>
     <select id="category_id" name="category_id">
       <?php foreach(select_category() as $category) { ?>
       <option value="<?php echo $category['id']; ?>">
         <?php echo $category['category']; ?>
       </option>
       <?php } ?>
     </select><br><br>

     <label for="">Beskrivelse:</label><br>
     <input type="text" name="describtion" value="" placeholder="Beskrivelse"> <br><br>
     <label for="">Minimumspris:</label><br>
     <input type="text" name="min_price" value="" placeholder="Minimumspris"> <br><br>
     <label for="">Udløbstidspunkt:</label><br>
     <input type="date" name="end_time" value="" placeholder="Udløbstidspunkt"> <br><br>
     <label for="">Billede:</label><br>
     <input type="image" src"submit.png" alt="Submit" style"float:right" width="40" heght="40"> <br><br>
     <button type="submit" name="button">Opret auktion</button>
   </body>
 </html>
