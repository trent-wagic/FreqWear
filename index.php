<?php
    include('login.php'); // Includes Login Script
    
    if(isset($_SESSION['login_user']))
    {
        echo "IN UNSET.......";       
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Form: FreqWear</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>

<div style="width: 100%; text-align: center;"> 
        <div id="main" style="width: 100%; text-align: center;">
            <h1>Login FreqWear Session</h1>
            <div id="login" style="width: 100%; text-align: center;">
                <h2>Login Form</h2>
                
                <form action="" method="post">
                    <div><label>UserName :</label>
                    <input id="name" name="username" placeholder="username" type="text"></div>
                    <div><label>Password :</label>
                    <input id="password" name="password" placeholder="**********" type="password"></div>
                    <input name="submit" type="submit" value=" Login ">
                    <span><?php echo $error; ?></span>
                </form>
            </div>
        </div>
    </div>

    </body>
</html>
