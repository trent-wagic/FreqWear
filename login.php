

<?php

echo "LOGIN.PHP....................";
session_start(); // Starting Session
//echo $sess;
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
{

    if (empty($_POST['username']) || empty($_POST['password'])) 
    { 
        $error = "Username or Password is invalid: EMPTY uname or pw";
    }
    else
    {

        // Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];     

        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysqli_connect("localhost", "root", "password", "FreqWear");



        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else
        {
            echo "ALL GOOD";
        }

        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        echo "aftr: ".$username."  ::  ".$password;


        // Selecting Database
        //$db = mysql_select_db("FreqWear", $connection);

        // SQL query to fetch information of registerd users and finds user match.
        echo "password: ".$password." uname: ".$username;
        $rs = mysqli_query($connection, "select count(*) as total from users where uname = '$username' AND pw = '$password'");
        //$rows = mysql_num_rows($query);

        while($row = mysqli_fetch_array($rs))
        {
            echo $row["total"]."<br>";
            $rows = $row["total"];
        }       

        if ($rows == 1) 
        {
            echo "REDIRECT"; 
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: profile.php"); // Redirecting To Other Page
            //$error = "FOUND ROW ".$rows;
        }
        else 
        {
            echo "....NOT FOUND IN DB....";
            $error = "Username or Password is invalid: NO FOUND! ".$rows;
        }

        mysqli_close($connection); // Closing Connection
        
    }

}
?>


