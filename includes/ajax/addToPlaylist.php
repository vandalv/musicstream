<?php 
include("../config.php");
if(isset($_POST['playlistId']) && isset($_POST['songId'])){
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];
    $q = mysqli_query($dbconnect, "SELECT IFNULL(MAX(playlistOrder) + 1, 1) AS playlistOrder FROM playlistSongs WHERE playlistID='playlistId'");
    $row = mysqli_fetch_array($q);
    $order = $row['playlistOrder'];
    $query = mysqli_query($dbconnect,"INSERT INTO playlistSongs VALUES('','$songId','$playlistId','$order')");

}
else{
    echo "Something Wrong";
}
?>