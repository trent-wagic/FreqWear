<?php
    //echo "LISTING"."<br>";

    include('session.php');
    session_start();
    $error = '';//initialize variable for error

    $connection = mysqli_connect("localhost", "root", "password", "FreqWear");

    $rs = mysqli_query($connection, "select * from users");
    $_SESSION['tables'] = '';

    while($row = mysqli_fetch_array($rs))
    {
        $_SESSION['tables'] = $_SESSION['tables']."<tr><td id='highlight'>".$row["u_id"]."</td><td id='highlight'>".$row["uname"]."</td><td><div id='highlight'>".$row["first_name"]."</div></td><td><div id='highlight'>".$row["last_name"]."</div></td><td id='highlight'>".$row["email"]."</td><td id='highlight'>".$row["role"]."</td></tr>";
    } 
    //echo $_SESSION['tables'];
    mysqli_close($connection);
   
?>
