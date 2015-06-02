<?php
    //echo "LISTING"."<br>";

    include('session.php');
    session_start();
    $error = '';//initialize variable for error

    $connection = mysqli_connect("localhost", "root", "password", "FreqWear");

    $rs = mysqli_query($connection, "select * from sales");
    $_SESSION['tables'] = '';

    while($row = mysqli_fetch_array($rs))
    {
        $_SESSION['tables'] = $_SESSION['tables']."<tr><td id='highlight'>".$row["sales_id"]."</td><td id='highlight'>".$row["u_id"]."</td><td id='highlight'>".$row["uname"]."</td><td><div id='highlight'>".$row["f_id"]."</div></td><td id='highlight'>".$row["fname"]."</td><td><div id='highlight'>".$row["sales_date"]."</div></td><td id='highlight'>".$row["sales_amt"]."</td><td id='highlight'>".$row["device_id"]."</td></tr>";
    } 
    //echo $_SESSION['tables'];
    mysqli_close($connection);
   
?>

<!--
INSERT INTO sales (u_id, uname, f_id, fname, sales_date, sales_amt, device_id) VALUES (1, "Trent", 1, "TrentRussell.jpg", "2015/02/03", 14.99, "8675309");


CREATE TABLE sales
(
    sales_id     INT AUTO_INCREMENT NOT NULL,
    u_id         INT NOT NULL,
    f_id         INT NOT NULL,
    sales_date   varchar(255) NOT NULL,
    sales_amt    DOUBLE NOT NULL,
    device_id    varchar(255) NOT NULL,
    PRIMARY KEY (sales_id)
);
-->
