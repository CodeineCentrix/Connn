
<html>
<head>
	<title>Vendor</title>

<link rel="stylesheet" href="../stylesheets/admin_pages.css">
<link rel="stylesheet" href="../stylesheets/fontawesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body>
            <div> <?php include '../View/admin_header.txt'; ?></div>
            <h1 class="string">Vendor Details</h1>
            <p class="string fa fa-info-circle">This page is used to add a vendor</p>
                <?php if(isset($vendor)):?>
                <?php if($vendor==TRUE): ?>
                <p class="isa_success">Vendor was successfully added</p>
                <?php else: ?>
                <p class="isa_error">Vendor wasn't added, try again- helps using a more reliable browser like google chrome</p>
                <?php endif; ?>
                <?php endif; ?>
                <div class="region">
                    <h2 class="string add_vendor">Add a vendor here</h2>
                <form method="POST" action="../Controller/index.php?action=Add_Vendor" enctype="multipart/form-data">
			<label>Vendor Name:</label><br>
                        <input type="text" align="center" name="vendor_name" required autofocus="true"><br>			
			<label>Description:</label><br>
                        <input type="text" align="center" name="vendor_description" required="true"><br>			
			<label>facebook Account:</label><br>
                        <input type="url" align="center" name="vendor_facebook"><br>			
			<label>Twitter Account:</label><br>
                        <input type="url" align="center" name="vendor_twitter"><br>			
			<label>Instagram Account:</label><br>
                        <input type="url" align="center" name="vendor_instagram"><br>			
			<label>Website Link:</label><br>
                        <input type="url" align="center" name="vendor_website"><br>			
			<label>Picture:</label><br>
                        <input type="file" align="center" required  accept="image/jpg" name="fpVenPicture"/><br>	
			<input type="submit" value="Add Vendor">			
		</form>
                </div>
		
	</body>
</html>