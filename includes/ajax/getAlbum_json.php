<?php 
    include("../config.php");
    if(isset($_POST['albumId'])){
        $artistId = $_POST['albumId'];
        $query = mysqli_query($dbconnect,"SELECT * FROM albums WHERE id='$albumId'");
        $resultArray = mysqli_fetch_array($query);
        echo json_encode($resultArray);
    }
?>