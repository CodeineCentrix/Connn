<html>
<head>
	<title>Vendor</title>
</head>
	<body>	         
            <div id="page-wrapper">
		
		<?php 
		if (isset($isSuccessfull)) {
                    if ($isSuccessfull === TRUE) {
                        echo '<p class="isa_success">Vendor was successfully edited</p>';
                    } else if ($isSuccessfull == FALSE) {
                        echo'<p class="isa_error">Vendor could not be edited, try again later ow yeah make sure you are not using firefox</p>';
                    }
                }
                ?>
                <div class="col-md-5">
                    <h1>Add Vendor Details</h1>
		<form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        
			<label>Vendor Name:</label><input type="text" class="form-control" name="vendor_name" required="true" autofocus="true"><br>
			<br>
			<label>Description:</label><input type="text" class="form-control" name="vendor_description" required="true"><br>
			<br>
			<label>facebook Account:</label><input type="url" class="form-control" name="vendor_facebook"><br>
			<br>
			<label>Twitter Account:</label><input type="url" class="form-control" name="vendor_twitter"><br>
			<br>
			<label>Instagram Account:</label><input type="url" class="form-control" name="vendor_instagram"><br>
			<br>
			<label>Website Link:</label><input type="url" class="form-control" name="vendor_website"><br>
			<br>
			<label>Picture:</label>
			<input type="file" align="center"  accept="image/jpg" name="fpVenPicture"/>
			
			<input type="hidden" name="action" value="Add_Vendor">
			<br>
			<br>
			<input type="submit" class="btn btn-primary" value="Submit"> &nbsp;&nbsp;
			</div>
		</form>
                </div>
<!--                <div class="col-md-6">
                    <h1>Edit Vendor Details</h1>
                        <form role="form" method="GET" action="?action=">
                            <input type="hidden" name="venID" value="<?php//if (isset($vendor['VenID'])) {
                                echo $vendor['VenID'];
                            }
                            ?>"/>
                            <div class="form-group">
                                <label>Vendors</label>
                                <select class="form-control">
                                    <option selected disabled value=''>Vendor</option>
                                    <?php //foreach($vendors as $ven) : ?>
                                    <option value="<?php //echo $ven['VenID']; ?>"> <?php// echo $ven['VenName']; ?> </option>
                                    <?php// endforeach; ?>
                                   
                                </select>
                                
                                </div>
                            <input type="submit" class="btn btn-block" value="find" > 
                        </form>
                </div>-->
                <div class="col-md-6">
		<?php
		$diplay;
				if(isset($diplay))
				{
					$image = imagecreatefromstring($diplay); 
					ob_start(); 
					imagejpeg($image, null, 80);
					$data = ob_get_contents();
					ob_end_clean();
					echo '<img src="data:image/jpg;base64, '.base64_encode($data).' " style="width:250px; height:250px;" />';
					
				}
				?>
                </div>
            
            </div>
	</body>
</html>