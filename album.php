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
        $i = 1;
        foreach($songIdArray as $idSong){
            $song = new Song($dbconnect, $idSong);
            $albumArtist = $song->getArtist();
            echo "<li class='tracklistRow'>
                <div class='trackCount'>
                    <img class='play' src='assets/icons/play-white.png'>
                    <span class='trackNumber'>$i</span>
                </div>
                <div class='trackInformation>
                    <span class='trackName'>" . $song->getTitle() . "</span>
                    <span class='artistName'>" . $albumArtist->getName() . "</span>
                </div>
                </li>";
                $i = $i + 1;
        }
        ?>
    </ul>
</div>
<?php include("includes/footer.php")?>