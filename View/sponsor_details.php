<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sponsor Management Page</title>
        <link rel="stylesheet" href="../stylesheets/admin_pages.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div><?php include '../View/admin_header.txt'; ?></div>
        <h1 class="string">Add or edit a Sponsor</h1>
        <p class="string fa fa-info-circle">This page enables the addition and modification of a sponsor</p>
        
        <?php if(isset($is_added)):?>
        <?php if($is_added===TRUE):?>
        <p class="isa_success">Sponsor was successfully added</p>
       <?php elseif($is_added===FALSE):?>
        <p class="isa_error">Sponsor was unfortunately unable to be added, try again</p>
        <?php endif;?>
        <?php endif; ?>
        
        <?php if(isset($is_edited)):?>
        <?php if($is_edited===TRUE):?>
        <p class="isa_success">Sponsor was successfully edited</p>
        <?php elseif ($is_edited==FALSE):?>
        <p class="isa_error">Sponsor could not be edited, try again</p>
        <?php endif;?>
        <?php endif;?>
        
        <div class="add_sponsor region"> 
            
            <div class="float_right">
                <h1>Edit a sponsor</h1>
            <form action="../Controller/index.php?action=maintain_sponsors" METHOD="POST">
                <label>Pick a sponsor</label><br>
                <select name="cmbsponsors">
                    <?php foreach ($cmb_data as $i):?>
                    <option value="<?php echo $i["SpoID"];?>"><?php echo $i["SpoName"];?></option>
                    <?php endforeach; ?>
                </select><br>
                <input type="hidden" value="search" name="searcher">
                <input type="submit" value="Find Sponsor">
            </form>
            </div>
            <strong><p>Sponsor details</p></strong>
            <form action="../Controller/index.php?action=maintain_sponsors" METHOD="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo isset($spon_details)?$spon_details["SpoID"]:NULL; ?>" name="current_record">
                <input type="hidden" value="<?php echo $input_event?>" name="event">
                <label>Enter Sponsor Name</label><br>
                <input type="text" name="txtsponsor_name" value="<?php echo isset($spon_details)?$spon_details["SpoName"]:NULL ?>" required><br>
            <label>Enter Sponsor Web link</label><br>
            <input type="url" name="txtweb_link" value="<?php echo isset($spon_details)?$spon_details["SpoWebsite"]: NULL ?>"><br>
            <label>Add a Sponsor image</label><br>
            <?php if($input_event=="update"&&isset($spon_details)): ?>
            <div>
              <?php 
              $url =$spon_details["SpoPicture"];
              $bas64 = base64_encode($url);
              $fQIMG = "data:image/jpg;base64,".$bas64; 
              
              echo '<img class="resizepic" alt="Image_here" src="' . $fQIMG. '"  />';?>
            </div>
            <?php endif; ?>
            <input type="file" name="fpsponsor_pic" <?php echo $input_event=="add"?"required":NULL ?> accept="image/jpg"><br>
            <input type="submit" value="Submit Sponsor">
            </form>
        </div>
        
    </body>
</html>
