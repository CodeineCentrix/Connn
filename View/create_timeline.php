<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add a year to the Timeline</title>
    </head>
    <body>
        <div id="page-wrapper">
        <h1>Add a year to the timeline</h1>
        <p>This page is used to add and modify a year on the timeline page</p>
        <form>
        <label>Enter the year</label>
        <input type="number" name="txtyear" required min="<?php echo ""; ?>"><br>
        <label>Enter a short description </label>
        <textarea name="desc">
            
        </textarea><br>
        <label>Attach images for the above year</label>
        <input type="file" name="pics" multiple required><br>
        <input type="submit" value="Add Year">
        </form>
        <h1>Edit a year</h1>
        <label>Select the year, you'd like to edit</label>
        <select name="cmbYear">
            <?php foreach ($array as $value):?>
            <option></option>
            <?php endforeach; ?>
        </select>
        
        <?php if(true):?>
        <form>
        <label>Enter the year</label>
        <input type="number" name="txtyear" required min="<?php echo ""; ?>"><br>
        <label>Enter a short description </label>
        <textarea name="desc">
            
        </textarea><br>
        <label>Attach images for the above year</label>
        <input type="file" name="pics" multiple required><br>
        <input type="submit" value="Add Year">
        </form>
        <?php endif; ?>
        </div>
    </body>
</html>
