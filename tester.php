<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    ///////////////////////////////////////////////////////////////////////////
    // PHP FUNCTIONS()
    ///////////////////////////////////////////////////////////////////////////
    function get_users()
    {
        
        $con = mysqli_connect("localhost", "root", "password", "FreqWear");

        // Check connection
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
    }//end get_users()


    ///////////////////////////////////////////////////////////////////////////
    // CONTROLLER FOR PHP FUNCTIONS
    ///////////////////////////////////////////////////////////////////////////
    $possible_url = array("get_users");

    $value = "An error has occurred";

    if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
    {
        switch ($_GET["action"])
        {
            case "get_users":  $value = get_users(); break;
        }
    }
    //return JSON array
    exit(json_encode($value));
?>
