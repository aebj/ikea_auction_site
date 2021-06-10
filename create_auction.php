<?php

include('functions.php');
include('template/navbar.php');
include('template/footer.php');

if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

   $extensions= array("jpeg","jpg","png");

   if(in_array($file_ext,$extensions)=== false){
      $errors[]="Udvidelse ikke tilladt. Vælg en JPEG- eller PNG-fil.";
   }

   if($file_size > 2097152){
      $errors[]='Filstørrelsen skal være nøjagtigt 2 MB';
   }

   if(empty($errors)==true){
      move_uploaded_file($file_tmp,"images/".$file_name);
      echo "Success";
   }else{
      print_r($errors);
   }
}
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
     </form>

     <form action = "" method = "POST" enctype = "multipart/form-data">
        <input type = "file" name = "image" />
        <input type = "submit"/>

        <ul>
           <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
           <li>File size: <?php echo $_FILES['image']['size'];  ?>
           <li>File type: <?php echo $_FILES['image']['type'] ?>
        </ul>

     </form>
     <button type="submit" name="button">Opret auktion</button>
   </body>
 </html>
