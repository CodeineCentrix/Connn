<head>
    <title>Business Page</title>
      <link rel="stylesheet" href="../stylesheets/admin_pages.css">
</head>
<body>
    <div id="page-wrapper">

    <!--<div class="hidden">
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
    </div>-->
    <div class="col-md-6">

        <h1>Business Details</h1>
        <form method="POST" action="../Controller/index.php">
            <div class="form-group">
                    <input  name="editBusID" type="hidden" value="<?php echo $business['BusID']; ?>"  />
                    <label>Business Name</label>
                    <input class="form-control" name="editBusName" type="text" required="true" value="<?php echo $business['BusName']; ?>"  />

                    <label>Date Founded</label>
                    <input class="form-control" name="editBusDateFound" type="date" required="true" value="<?php echo $business['BusDateFound']; ?>"  />

                    <label >Slogan</label>
                    <input class="form-control" name="editBusSlogan" type="text" required="true" value="<?php echo $business['BusSlogan']; ?>" />

                    <label>logo</label>
                    <input class="form-control" name="editBuslogo" type="text" required="true" value="<?php echo $business['BusLogo']; ?>" />

                    <label>Address</label>
                    <input class="form-control" name="editBusAddress" type="text" required="true" value="<?php echo $business['BusAddressID']; ?>" />

                    <label>About us</label>
                    <textarea class="form-control" name="editBusAboutUs" required="true" ><?php echo $business['BusAboutUs']; ?> </textarea>

                    <input type="submit" class="btn btn-primary" value="Edit business">
                    <input type="hidden"  name="action" value="edit_business">
            </div>
    </form>

    </div>
    </div>
</body>