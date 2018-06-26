<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Gallery Uploads</title>
	
	<link rel="stylesheet" type="text/css" href="../stylesheets/admin_pages.css">
</head>
<div id="page-wrapper">
	<body>
            <h1>Upload Pictures For Gallery</h1>
	<hr>
		<div class=".div">
		<form method="post" action="" enctype="multipart/form-data">
			<h5 id="h5">Click The "Browse" Button Below To Pick An Image To Upload.  </h5>
		<br>
			<label>Picture:</label><input type="file" align="center" name="image" required="true" autofocus="true"><br>
		<br>
			<label>Description:</label><input type="text" align="center" name="image_description" required="true"><br>
		<br>
                <label>Date:</label><input type="text"  align="center" name="image_date"><br>
		<br>
			<input type="hidden" value="add_picture" name="action">
			<input type="submit" value="Upload"> &nbsp;&nbsp;
		</form>
	</div>
        </div>
	</body>
</html>