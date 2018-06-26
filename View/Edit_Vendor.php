
<html>

	<body>
            
            <div id="page-wrapper">
               
		<div class="editVendor">
			<h1>Edit Vendor Details</h1>
			<?php if(isset($isSuccessfull)){
					if($isSuccessfull===TRUE){echo '<p class="isa_success">Vendor was successfully edited</p>';}
					else if ($isSuccessfull==FALSE){echo'<p class="isa_error">Vendor could not be edited, try again later ow yeah make sure you are not using firefox</p>';}
                        }
			?>
                     <div class="col-md-6">
                        <form role="form" method="POST" action="">
                            <input type="hidden" name="action" value="show_edit_vendor">
                            <input type="hidden" name="venID" value="<?php echo $vendor['VenID']; ?>"/>
                            <div class="form-group">
                                <label>Vendors</label>
                                <select class="form-control" name="dbVenID">
                                    <option selected disabled value=''>Vendor</option>
                                    <?php foreach($vendors as $ven) : ?>
                                    <option value="<?php echo $ven['VenID']; ?>"> <?php echo $ven['VenName']; ?> </option>
                                    <?php endforeach; ?>
                                   
                                </select>
                                
                                </div>
                            <input type="submit" class="btn btn-primary" value="find" > 
                        </form>
                  
		
		<!--HTML CONTROLS--> 
               
                    <form role="form" method="POST" action="../Controller/index.php?action=edit_vendor_get&vendorID=<?php echo $vendor['VenID']; ?>&venName=<?php echo $vendor['VenName']; ?>&venDescription=<?php echo $vendor['VenDescription']; ?>" enctype="multipart/form-data">
				<input type="hidden" name="venID" value="<?php echo $vendor['VenID']; ?>"/>
				<div class="form-group">
                                <label>Vendor Name:</label>
                                <input type="text" class="form-control" value="<?php echo $vendor['VenName']; ?>" name="venName" required="true" autofocus="true"><br>
                                </div>
                               
                                <div class="form-group">
				<label>Description:</label>
				<input type="text" class="form-control" value="<?php echo $vendor['VenDescription']; ?>" name="venDescription" required="true"><br>
				 </div>
                               
                                <div class="form-group">
				<label>facebook Account:</label>
				<input type="url" class="form-control" name="venFacebook" value="<?php echo $vendor['VenFacebook']; ?>"><br>
				 </div>
                               
                                <div class="form-group">
				<label>Twitter Account:</label>

				<input type="url" class="form-control" name="venTwitter" value="<?php echo $vendor['VenTwitter']; ?>"><br>
				 </div>
                               
                                <div class="form-group">
				<label>Instagram Account:</label>
				<input type="url" class="form-control" name="venInstagram" value="<?php echo $vendor['VenInstagram']; ?>"><br>
				 </div>
                               
                                <div class="form-group">
				<label>Website Link:</label>
				<input type="url" class="form-control" name="venWebsite" value="<?php echo $vendor['VenWebsite']; ?>"><br>

				 </div>
                               
                                <div class="form-group">
				<label>Vendor picture:</label>
				<input type="file"  accept="image/jpg" name="fpVenPicture"/><br>

				 </div>
                               
                              
		
				
				
				<input type="hidden" name="action" value="edit_vendor">
				<input type="submit" class="btn btn-primary" value="Submit" > 
			
			</form>

		</div>
                <div class="col-md-6">
                       <?php
				if(isset($vendor['VenPicture']))
				{
					$image = imagecreatefromstring($vendor['VenPicture']); 
					ob_start(); 
					imagejpeg($image, null, 80);
					$data = ob_get_contents();
					ob_end_clean();
					echo '<img src="data:image/jpg;base64, '.base64_encode($data).' " style="width:250px; height:250px;" />';
					echo '<input type="hidden" name="hdImage" value="'.base64_encode($vendor['VenPicture']).'" />';	
				}
				?>
                </div>
	</div>
	</body>
</html>