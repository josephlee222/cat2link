<?php
//Connection details
$hostname = "sql313.epizy.com";
$username = "epiz_26738007";
$password = "hz3HyjMkOc3oK";
$db_name = "epiz_26738007_innovate";
$db_connect = "";

//Connect to the database
$db_connect = mysqli_connect($hostname, $username, $password, $db_name);

if (!$db_connect) {
    //In case mySQL connection failed
    die("Connection Failed" . mysqli_connect_error($db_connect));
}
?>