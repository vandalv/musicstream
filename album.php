<?php 
include("includes/header.php");
if(isset($_GET['id'])){
    $idAlbum =  $_GET['id'];
}
else{
    header("Location: index.php");
}

$albumQuery = mysqli_query($dbconnect, "SELECT * FROM albums WHERE id='$idAlbum'");
$album = mysqli_fetch_array($albumQuery);
$artistNo = $album['artist'];
echo $album['title'];
$artistQuery = mysqli_query($dbconnect, "SELECT * FROM artists WHERE id='$artistNo'");
$artist = mysqli_fetch_array($artistQuery);
echo $artist['name'];
?>
<?php include("includes/footer.php")?>