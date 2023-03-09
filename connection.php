<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "exp";
 
$con = mysqli_connect($servername, $username, $password, $dbName);

if(!$con)
{
    //echo("Connection Successful");
    die(mysqli_error($con));    
}


?>