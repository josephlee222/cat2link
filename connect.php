<?php
//Connection details
$hostname = "";
$username = "";
$password = "";
$db_name = "";
$content_src = "localhost";

//Connect to the database
$db_connect = mysqli_connect($hostname, $username, $password, $db_name);

if (!$db_connect) {
    //In case mySQL connection failed
    die("Connection Failed" . mysqli_connect_error($db_connect));
}
?>