<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_POST['action']) && !empty($_POST['action'])) 
{
    $action = $_POST['action'];
    switch($action) 
    {
        case 'test' : test();break;   
        case 'check_uid_pw' : check_uid_pw();break; 
    }
}

function test()
{
    echo "0"; 
}

function check_uid_pw()
{
    echo "HERE...";
}


?>
