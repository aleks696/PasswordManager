<?php
// Connecting to DataBase
// Input your data for Connection
    $DBHOST = "localhost";
    $DBUSER = "root";
    $DBPASSWORD = "";
    $DBNAME = "db1";

    global $conn;
    $conn = mysqli_connect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
    if($conn){
        echo " ";
    } else{
        die("Error". mysqli_connect_error());
    }
?>
