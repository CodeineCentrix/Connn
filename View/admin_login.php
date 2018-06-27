<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>
        <link rel="stylesheet" href="../stylesheets/bootstrap.css">
        <link rel="stylesheet" href="../stylesheets/general.css">
        <link rel="stylesheet" href="../stylesheets/admin_pages.css">
        <style>
            
        </style>
        <link rel="stylesheet" href="../stylesheets/bootstrap.css">
    </head>
    <body>
        <div class="login_holder">
            <div>
                <img src="../pics/conect_logo.png" style="max-width: 300px;">  
            </div>
            
        <h1>Enter your administration credentials to continue</h1>
        <form method="POST" action="../Controller/index.php?action=admin_login">
        <div class="input_holder">
            <input type="text" class="form-control" name="username" required placeholder="Username"><br>
            <input type="password" class="form-control" name="password" required placeholder="Password"><br>
        </div>
            <?php if(isset($login_admin)): ?>
            <?php if(empty($login_admin)):?>
            <p class="isa_error">Incorrect credentials, try again or <a href=".">reset credentials </a></p>
            <?php endif;?>
            <?php endif;?>
        <div>
            <input type="submit" class="btn-primary btn" value="Log in">
        </div>
        </form>
        </div>
    </body>
</html>
