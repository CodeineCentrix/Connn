<!DOCTYPE html>
<html>
<head>
	<title>Edit Vendor</title>
        <link rel="stylesheet" href="../stylesheets/admin_pages.css">
        <link rel="stylesheet" href="../stylesheets/fontawesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body>
            <div>  <?php include '../View/admin_header.txt'; ?></div>

                <h1 class="string">Edit Vendor Details</h1>
                <p class="string fa fa-info-circle">This page is used to edit a vendor</p>
                <?php if(isset($isSuccessfull)):?>
                <?php if($isSuccessfull==TRUE): ?>
                <p class="isa_success">Vendor was successfully edited</p>
                <?php else: ?>
                <p class="isa_error">Vendor wasn't edited, try again- helps using a more reliable browser like google chrome</p>
                <?php endif; ?>
                <?php endif; ?>
                <div class="region">
                    <h2>Edit a Vendor</h2>
                <div class="region float_right edit_vendor">
                    <h2>Select a Vendor to edit</h2>
                <select id="cmbVends">
                    <option value="">Pick a Vendor</option>
                    <?php foreach($vendors as $ven) : ?>
                    <option value="?action=show_edit_vendor&vendorID=<?php echo $ven['VenID']; ?>"><?php echo $ven['VenName']; ?></option>
                    <?php endforeach; ?>
                </select>
                    <script>
                    document.getElementById("cmbVends").onchange = function() {
                        if (this.selectedIndex!==0) {
                            window.location.href = this.value;
                        }        
                    };
                 </script>
                    </div>
                    <div class="vendor_form_content">
			<form method="POST" action="../Controller/index.php?action=edit_vendor_get&vendorID=<?php echo $vendor['VenID']; ?>&venName=<?php echo $vendor['VenName']; ?>&venDescription=<?php echo $vendor['VenDescription']; ?>" enctype="multipart/form-data">
				<input type="hidden" name="venID" value="<?php echo $vendor['VenID']; ?>"/>
				<label>Vendor Name:</label><br>
				<input type="text" align="center" value="<?php echo $vendor['VenName']; ?>" name="venName" required><br>
				<label>Description:</label><br>
				<input type="text" align="center" value="<?php echo $vendor['VenDescription']; ?>" name="venDescription" required><br>
				<label>facebook Account:</label><br>
				<input type="url" align="center" name="venFacebook" value="<?php echo $vendor['VenFacebook']; ?>"><br>
				<label>Twitter Account:</label><br>
				<input type="url" align="center" name="venTwitter" value="<?php echo $vendor['VenTwitter']; ?>"><br>
				<label>Instagram Account:</label><br>
				<input type="url" align="center" name="venInstagram" value="<?php echo $vendor['VenInstagram']; ?>"><br>
				<label>Website Link:</label><br>
				<input type="url" align="center" name="venWebsite" value="<?php echo $vendor['VenWebsite']; ?>"><br>
				<label>Vendor picture:</label><br>
				<input type="file" accept="image/jpg" name="fpVenPicture"/><br>
		
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
				<br>
				<br>
				<input type="hidden" name="action" value="edit_vendor">
				<input type="submit" value="Edit Vendor" > 
			
			</form>
                    </div>

                </div>
	</body>
</html>