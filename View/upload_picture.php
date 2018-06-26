<?php
   if(isset($_FILES['image'])){
      $errors= array();
     echo $file_name = $_FILES['image']['name'];
     echo $file_size =$_FILES['image']['size'];
     echo $file_tmp =$_FILES['image']['tmp_name'];
     echo $file_type=$_FILES['image']['type'];
     echo $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   function picture_validation($filepicker_name) {
    if(isset($_FILES[$filepicker_name])){
     $file_name = $_FILES[$filepicker_name]['name'];
     $file_size =$_FILES[$filepicker_name]['size'];
     $file_tmp =$_FILES[$filepicker_name]['tmp_name'];
     $file_ext=strtolower(end(explode('.',$_FILES[$filepicker_name]['name'])));
     $expensions= array("jpeg","jpg","png");
     image_check($file_name,$file_size,$file_tmp,$file_ext,$expensions);
   }
}
function image_check($file_name,$file_size,$file_tmp,$file_ext,$expensions) {
    $errors= array();
    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if($file_size > 2097152){
        $errors[]='File size must be atleast less than 2 MB';
      }
     elseif ($file_size<152) {  
        $errors[]='File size too small';
      }
      if(empty($errors)==true){
        move_uploaded_file($file_tmp,"images/".$file_name);
        return $success = array( "Success");
      }else{
         return $errors;
      }
}
?>
<form action = "http://localhost/connect/View/upload_picture.php" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php  echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size']; ?>
            <li>File type: <?php echo $_FILES['image']['type']; ?>
         </ul>
			
      </form>

