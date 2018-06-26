<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>News Coverage</title>
    </head>
    <body>
        <h1>News coverage</h1>
        <p>This page allows the adding and editing of news coverage</p>
        <form>
        <label>Enter Title</label>
        <input type="text" name="txtTitle" required><br>
        <label>Enter a description of the article </label>
        <textarea name="txtdesc" required>
            
        </textarea><br>
        <label>Enter the link to the article</label>
        <input type="url" name="txturl" required><br>
        <input type="submit" value="Add Coverage">
        </form>
    </body>
</html>
