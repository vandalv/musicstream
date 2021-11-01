<?php 
include("includes/classes/Artist.php");
include("includes/header.php");
if(isset($_GET['id'])){
    $idAlbum =  $_GET['id'];
}
else{
    header("Location: index.php");
}

$albumQuery = mysqli_query($dbconnect, "SELECT * FROM albums WHERE id='$idAlbum'");
$album = mysqli_fetch_array($albumQuery);
$artist = new Artist($dbconnect, $album['artist']);
echo $artist->getName();
?>
<?php include("includes/footer.php")?>