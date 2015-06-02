<?php
    session_start(); // Starting Session
    include('session.php');//Check if session is valid...

    echo "Received {$_FILES['userfile']['name']} - its size is {$_FILES['userfile']['size']} "."<html>\r\n</html>";  

    /*$allowed = array("mp3", "wav", "WAV", "MP3", "Mp3");

    if(in_array($_FILES['userfile']['name'], $allowed))
    {
        echo " IN THE HIZOUZEEEEE...";
    }*/

    $filename = $_FILES['userfile']['name'];
    $check = '';
    $check = shell_exec("[ -f MP3/".$filename." ] && echo 'found'");
    $str = 'found'."\n";

    /*if(strcmp($check, $str) == 0)
    {
        $_SESSION['file_upload'] = "FILE FOUND:".$check." :: ".strcmp($check, $str);
    }
    else
    {
        $_SESSION['file_upload'] = "FILE NOT FOUND:".$check.":: ".strcmp($check, $str). " length:".strlen($check);
    }*/

    if(strcmp($check, $str) != 0)
    {
        //$_SESSION['file_upload'] = "YOU ARE COOL";
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], "/var/www/html/MP3/".$_FILES['userfile']['name'] )) 
        {
            print "Received {$_FILES['userfile']['name']} - its size is {$_FILES['userfile']['size']}";

            $freq = $_FILES['userfile']['name'].".freq";
            //$base = basename($_FILES['userfile']['name'], ".mp3").PHP_EOL;

            $connection = mysqli_connect("localhost", "root", "password", "FreqWear");
            if (!$connection)
            {
                die("Connection Failed: " . mysqli_connect_error());
            }

            //$freq_file = $_FILES['userfile']['name'].".freq"
            shell_exec("aubiopitch -i 'MP3/".$_FILES['userfile']['name']."' >> 'MP3/".$freq."'");
            $filesize = shell_exec("wc -c <'MP3/".$freq."'");
            //$filesize = filesize($freq);//Wasn't accurate enough!

	    if($filesize == 0 || $filesize == "0")
	    {
	        $_SESSION['file_upload'] = " NO AUDIO OUT FILE. Filesize:".$filesize. " name:".$freq;
	        shell_exec("rm 'MP3/".$_FILES['userfile']['name']."' 'MP3/".$freq."'");
	    }
            else 
	    {
	        ////////////////////////////////////////////////////////////////////



                ///////////////////////////////////////////////////////////////////
                $sql = "INSERT INTO files (fname, protocol) VALUES ('{$_FILES['userfile']['name']}', '{$freq}');";          

                if(mysqli_query($connection, $sql))
                {
                    echo "New Record in DB.";
                    $_SESSION['file_upload'] = "Upload Succeeded And Inserted Into The Database. ".$freq." size ".$filesize . $_SESSION['file_upload'];	    
                }
                else
                {
                    echo "ERROR: " . $sql . "<br>" . mysqli_error($connection) ;
	            $_SESSION['file_upload'] = "Upload Failed: Database Error";
	            //shell_exec("rm 'MP3/".$_FILES['userfile']['name']."' 'MP3/".$freq."'");
                }
            }
            mysqli_close($connection);
        } 
        else 
	{
            print "Upload failed!";
	    $_SESSION['file_upload'] = "Upload Failed: Transfer Error";
        }
	
    }
    else
    {
        $_SESSION['file_upload'] = "Duplicate File Exists, Can't Upload.";
    }
    

    header("location: profile.php"); // Redirecting To Other Page

?>

