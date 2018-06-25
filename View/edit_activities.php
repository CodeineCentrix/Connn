<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Activities</title>
        <link rel="stylesheet" href="../stylesheets/admin_pages.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div><?php include '../View/admin_header.txt'; ?></div>
        <h1 class="string">Edit an activity</h1>
         <p class="string fa fa-info-circle ">This page is used to update event activities</p>
        <?php if(isset($is_edited)==TRUE):?>
        <?php if($is_edited===TRUE):?>
        <p class="isa_success">Activity has been Successfully edited!</p>
        <?php elseif($is_edited===FALSE): ?>
        <p class="isa_error">unfortunately, the activity couldn't be edited... Try again later. </p>
        <?php endif; ?>
        <?php endif;?>
        
        <?php foreach ($activities as $acts): ?>
        <div class="region">
            <form method="POST" action="../Controller/index.php?action=edit_event_activities">
                <label>The Event Alias Name:</label><br>
                <select name="cmbEvent">
                <?php foreach ($events_combo as $ss): ?>
                <option value="<?php echo $ss["EveID"];?>" <?php
                if($ss["EveID"]==$acts["EveID"]){
                    echo "selected";
                }
                ?>><?php echo $ss["EveName"];?></option>
                <?php endforeach; ?>
                </select><br>
                <label>Enter the new Title</label><br>
                <input type="text" name="txtTitle" value="<?php echo $acts["Title"];?>"><br>
                <label>Enter the new title paragraph</label><br>
                <textarea name="txtDescription" cols="100" rows="15" required><?php echo $acts["Descr"]; ?></textarea><br>
                <input type="hidden" value="confirm" name="event">
                <input type="hidden" value="<?php echo $acts["EveActID"];?>" name="current_record">
                <input type="submit" value="Edit Activity">
            </form>
        </div>
        <?php endforeach;?>
    </body>
</html>
