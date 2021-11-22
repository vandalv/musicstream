<?php 
include("../config.php");
if(isset($_POST['playlistId']) && isset($_POST['songId'])){
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];
    $q = mysqli_query($dbconnect, "DELETE FROM playlistSongs Where playlistId='$playlistId' AND songId='$songId'");
}
else{
    echo "Something Wrong";
}
?>