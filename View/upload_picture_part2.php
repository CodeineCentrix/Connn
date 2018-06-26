<html>
   <body>
      
      <form action = "http://localhost/connect/View/upload_picture.php" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php if(isset($_FILES['image'])){ echo $_FILES['image']['name'];}  ?>
            <li>File size: <?php if(isset($_FILES['image'])){ echo $_FILES['image']['size'];} ?>
            <li>File type: <?php if(isset($_FILES['image'])){ echo $_FILES['image']['type'];} ?>
         </ul>
			
      </form>
      
   </body>
</html>