<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mail_auth";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
die("Database Connection Failed");
}

?>