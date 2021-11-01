<?php 
include("includes/header.php");
if(isset($_GET['id'])){
    $idAlbum =  $_GET['id'];
}
else{
    header("Location: index.php");
}

$album = new Album($dbconnect, $idAlbum);

?>
<div class="albumInfoHead">
    <div class="leftSide">
        <img src="<?php echo $album-> artworkPath();?>">
    </div>
    <div class="rightSide">
        <h2><?php echo $album -> getTitle();?></h2>
        <h2 id="beGreen">by <?php echo $album -> getArtist() -> getName();?></h2>
        <p>Number Of Tracks:<?php echo $album -> numberOfSongs();?></p>
    </div>
</div>
<div class="trackContainer">
    <ul class="trackList">
        <?php 
        $songIdArray = $album->getSongId();
        foreach($songIdArray as $idSong){
            echo $idSong . "<br>";
        }
        ?>
    </ul>
</div>
<?php include("includes/footer.php")?>