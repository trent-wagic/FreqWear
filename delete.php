<?php
include('session.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_POST['action']) && !empty($_POST['action'])) 
{

    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    //$connection = mysqli_connect("localhost", "root", "password", "FreqWear");

/*    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
*/

    $action = $_POST['action'];
    switch($action) 
    {
        case 'test' : test($_POST['id']);break;   
    }
}

function test($id)
{
    //echo "IN TEST: echo ".$id;
    //return "IN TEST: return";
    //$rs = mysqli_query($connection, "DELETE FROM files WHERE f_id = ".$_POST[''].";");
    $connection = mysqli_connect("localhost", "root", "password", "FreqWear");
  

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $rs = mysqli_query($connection, "SELECT * FROM files WHERE f_id = ".$id);
    $row = mysqli_fetch_array($rs);
    $fname = $row['fname'];    
      
    //shell_exec('sudo rm MP3/'.$fname);
    //$str = shell_exec('ls MP3/');
    //echo $fname;

    //$fname2 = str_replace(" ", "\ ", $fname);
    //echo $fname2;
    shell_exec("rm 'MP3/".$fname."' 'MP3/".$fname.".freq'");
    mysqli_query($connection, "DELETE FROM files WHERE fname = '".$fname."'");

    header("Location: profile.php"); // Redirecting To Profile Page

    //echo $fname; 
}

?>

