<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
    echo "<script>
    let loggedUser = '$userLoggedIn';
    alert(loggedUser);
    </script>";
}
else{
    header('Location: registration.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Mucic Stream</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='assets/js/script.js'></script>
</head>
<body>
    <div id="mainContainer">
        <div id="topContainer">
            <?php include("includes/navBarContainer.php")?>
            <div id="mainViewContainer">
                <div id="pageContent">