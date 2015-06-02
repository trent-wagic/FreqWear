<?php

include('session.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

function get_all_users()
{
//    phpinfo(); 
    $con=mysqli_connect("p:localhost", "root", "password", "FreqWear");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $arr = array();

    $query = sprintf("SELECT * FROM users");
    $rs=mysqli_query($con, $query);

    while($obj = mysqli_fetch_object($rs))
    {
        $arr[] = $obj;
    }

    return $arr;
}

function get_all_files()
{
    $con=mysqli_connect("p:localhost", "root", "password", "FreqWear");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $arr = array();

    $query = sprintf("SELECT * FROM files");
    $rs=mysqli_query($con, $query);

    while($obj = mysqli_fetch_object($rs))
    {
        $arr[] = $obj;
    }

    return $arr;
}


$possible_url = array("get_all_users", "get_all_files");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{

  switch ($_GET["action"])
  {
      case "get_all_users":
          $value = get_all_users();
      break;

      case "get_all_files":
          $value = get_all_files();
      break;
  }
}

//return JSON array
exit(json_encode($value));

?>

