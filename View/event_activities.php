<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Event Activities</title>
        <link rel="stylesheet" href="../stylesheets/admin_pages.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="page-wrapper">
        <div class="col-md-6">
        <h1>Add an activity</h1>
       <!--  <p class="string fa fa-info-circle ">This page is used to create, maintain and update event activities</p>-->
        <?php if(isset($is_added)==TRUE):?>
        <?php if($is_added===TRUE):?>
        <p class="isa_success">Activity has been Successfully added!</p>
        <?php elseif($is_added===FALSE): ?>
        <p class="isa_error">unfortunately, the activity couldn't be added... Try again later. </p>
        <?php endif; ?>
        <?php endif;?>
        
        <div>
            
            <form method="POST" action="../Controller/index.php?action=maintain_event_activities">
                   <div class="form-group">
                <label>Select an event before adding a activity</label>
                <select name="cmbevents" required class="form-control">
                  <?php foreach ($events_combo as $ss): ?>
                <option value="<?php echo $ss["EveID"];?>"><?php echo $ss["EveName"];?></option>
                <?php endforeach; ?>   
                </select>
                <label>Enter a catchy heading</label>
                <input type="text" name="txtTitle" required class="form-control">
                <label>Enter the headings paragraph</label>
                <textarea name="txtDescription" required class="form-control"></textarea>
                <input type="hidden" value="confirm" name="event">
                <input type="submit" class="btn btn-primary" value="Add Activity">
                   </div>
                </form>
            <a href="../Controller/index.php?action=">Edit activities</a>
        </div>
    </body>
    </div>
    </div>
</html>
