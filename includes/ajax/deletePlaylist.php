<?php 
    include("../config.php");
    if(isset($_POST['playlistId'])){
        $playlistId = $_POST['playlistId'];
        $queryPl = mysqli_query($dbconnect, "DELETE FROM playlists WHERE id='$playlistId'");
        $queryS = mysqli_query($dbconnect, "DELETE FROM playlistsongs WHERE playlistId='$playlistId'");
    }
    else{
        echo "Something Wrong";
    }
?>