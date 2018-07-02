<!DOCTYPE html>
<html>
<head>
	<title>Gallery Uploads</title>
          <link rel="stylesheet" href="../stylesheets/admin_pages.css">
</head>
    <body>
            <div id="page-wrapper">
                <div class="col-md-5">
                <h1>Upload Pictures For Gallery</h1>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Description:</label><input type="text" placeholder="Helps you to find image" autofocus="true" class="form-control" name="image_description" required="true"><br>
                        <label>Year:</label><input type="text" placeholder="Groups the image to its year"  class="form-control" name="image_date" required="true"><br>
                        <label>Picture:</label><input type="file" accept="image/*"  name="galImage" required><br>
                    </div>
                    <input type="hidden" name="action" value="add_picture"> 
                    <input type="submit" class="btn btn-primary" value="Upload"> &nbsp;&nbsp;
                </form>
            </div>
                
            <div class="col-md-5">
            <?php
               
                if (isset($isSuccessfull)) {
                if ($isSuccessfull == TRUE) {
                    echo '<div class="col-md-5 alert alert-success alert-dismissable" >picture was successfully add';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>';

                    if (isset($image)) {
                        $image = imagecreatefromstring($image);
                        ob_start();
                        imagejpeg($image, null, 80);
                        $data = ob_get_contents();
                        ob_end_clean();
                        echo '<img src="data:image/jpg;base64, ' . base64_encode($data) . ' " style="width:450px; height:350px;" />';
                        echo '<h3>' . $galDate . '</>';
                        echo '<h3>' . $galDesc . '</>';
                    }
                } else if ($isSuccessfull == FALSE) {
                    echo'<div class="col-md-5 alert alert-danger alert-dismissable" >'
                    . 'picture could not be add. maybe its bigger than 2MB or not a .jpg';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>';
                }
            }
            ?>
            </div>
        </div>
    </body>
</html>