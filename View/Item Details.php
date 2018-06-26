<!DOCTYPE html><!DOCTYPE html>
	<html>
	<head>
		<title>Add Items</title>
		
	</head>
		<body>
                     <div id="page-wrapper">
                    <h1> Item Details </h1>
			<label>Click The "Get Items" Button To Choose How Many Items To Add</label><br>
			<div id="fields">
			</div>
			<form method="post" action=".">
				<input type="button" value="Get Items" onclick="getNumItems()" >
				<script>
					
					function getNumItems()
					{
						document.getElementById("fields").innerHTML = "";
						var amt = prompt("How many Items Do You Want To Add?");
						for (var i = 1; i <= amt; i++) 
						{
							document.getElementById("fields").innerHTML += '<b>ITEM '+i+'</b>'+'<br><br><label>Name:</label><input type="text" align="center" name="name" required="true"><br><br>'+
							'<label>Description:</label><input type="text" align="center" name="description"><br><br>'+
							'<label>Quantity:</label><input type="number" align="center" name="quantity"><br><br>'+
							'<label>Price:</label><input type="number" align="center" name="price"><br><br>';
						}
					}

				</script>
				<br>
				<br>
				<input type="submit" value="Submit" name="submit">
			</form>
                     </div>>
		</body>
</html>
