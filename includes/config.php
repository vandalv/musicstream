<?php 
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$timezone = date_default_timezone_set("Europe/Warsaw");

$dbconnect = mysqli_connect("localhost", "root", "", "musicstreamdb");

if(mysqli_connect_errno()){
    echo "Unable to connect to database: " . mysqli_connect_errno();
}
?>