
<?php

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "password", "FreqWear");

session_start();// Starting Session
//echo $_SESSION['login_user'];
// Storing Session
$user_check=$_SESSION['login_user'];
//echo $user_check;
//echo "So far, so good";

$query="SELECT uname as name FROM users WHERE uname = '$user_check'";

// SQL Query To Fetch Complete Information Of User
$rs=mysqli_query($connection, $query);

while($row = mysqli_fetch_array($rs))
{
    //echo $row["name"]."<br>";
    $login_session = $row["name"];
}

mysqli_close($connection); // Closing Connection


if(!isset($login_session))
{
    // mysqli_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
}

?>








