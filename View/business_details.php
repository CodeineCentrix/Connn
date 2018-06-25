<?php include 'admin_header.txt'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Page</title>
        <style>
            div.hidden {
                display: none;
            }
        </style>
    </head>
    <body>
        <h1>Business Details</h1>
        <div class="hidden">
        <h2>This page enables you to add Business details once</h2>
        <form method="POST">
                <div>
                        <label>Business Name</label>
			<input id="addBusName" type="text" value="<?php echo $business['BusName']; ?>" required="true" /><br/><br/>
			<label>Date Founded</label>
			<input id="addBusDateFound" type="text" value="<?php echo $business['BusDateFound']; ?>" required="true" /><br/><br/>
			<label >Slogan</label>
			<input id="addBusSlogan" type="text" value="<?php echo $business['BusSlogan']; ?>" required="true" /><br/><br/>
			<label>logo</label>
			<input id="addBuslogo" type="file" value="<?php echo $business['BusLogo']; ?>" required="true" /><br/><br/>
			<label>Address</label>
			<input id="addBusAddress" type="text" value="<?php echo $business['BusAddressID']; ?>" required="true" /><br/><br/>
			<label>About us</label>
			<textarea id="addbusAboutUS" value="<?php echo $business['BusAboutUs']; ?>" cols="80" name="aboutUs" rows="5" required="true" ></textarea><br/><br/>
                        <input type="submit" value="Add Business">
		</div>
	</form>
        </div>
        <div>
            <hr/>
            <h2>Edit business details here</h2>
            <form method="POST" action="../Controller/index.php">
                <div>
                        <input name="editBusID" type="hidden" value="<?php echo $business['BusID']; ?>"  />
                        <label>Business Name</label>
			<input name="editBusName" type="text" required="true" value="<?php echo $business['BusName']; ?>"  />
                        <br/><br/>
			<label>Date Founded</label>
                        <input name="editBusDateFound" type="date" required="true" value="<?php echo $business['BusDateFound']; ?>"  />
                        <br/><br/>
			<label >Slogan</label>
			<input name="editBusSlogan" type="text" required="true" value="<?php echo $business['BusSlogan']; ?>" />
                        <br/><br/>
			<label>logo</label>
                        <input name="editBuslogo" type="text" required="true" value="<?php echo $business['BusLogo']; ?>" />
                        <br/><br/>
			<label>Address</label>
			<input name="editBusAddress" type="text" required="true" value="<?php echo $business['BusAddressID']; ?>" />
                        <br/><br/>
			<label>About us</label>
			<textarea name="editBusAboutUs" required="true" ><?php echo $business['BusAboutUs']; ?> </textarea>
                        <br/><br/>
                        <input type="submit" value="Edit business">
                        <input type="hidden" name="action" value="edit_business">
		</div>
	</form>
        </div>
    </body>
</html>