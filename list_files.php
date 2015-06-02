<?php
    //echo "LISTING"."<br>";

    include('session.php');
    session_start();
    $error = '';//initialize variable for error

    $connection = mysqli_connect("localhost", "root", "password", "FreqWear");

    $rs = mysqli_query($connection, "select * from files");
    $_SESSION['tables'] = '';

    while($row = mysqli_fetch_array($rs))
    {
        $_SESSION['tables'] = $_SESSION['tables']."<tr><td id='highlight'>".$row["f_id"]."</td><td id='highlight'>".$row["fname"]."</td><td><div id='highlight'>".$row["protocol"]."</div></td><td><div id='highlight'>NO MORE BUTTONS!!!</div></td></tr>";
        

	//<tr><td>Eve</td><td>Jackson</td><td>94</td></tr>			
        //<form action="test("")">
        //<input name="submit" type="submit" value=" Login ">
    } 
    //echo $_SESSION['tables'];
    mysqli_close($connection);
   
?>
