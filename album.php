<?php 
include("includes/includedFiles.php");
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
        <p>Number Of Tracks:
            <?php 
            str_repeat('&nbsp;', 1);
            echo ' ' . $album->numberOfSongs();
            ?>
        </p>
    </div>
</div>
<div class="trackContainer">
    <ul class="trackList">
        <?php 
        $songIdArray = $album->getSongId();
        $i = 1;
        foreach($songIdArray as $idSong){
            $song = new Song($dbconnect, $idSong);
            echo "<li class='tracklistRow'>
                <div class='trackCount'>
                    <img class='play' src='assets/icons/play-white.png' onclick='setTrack(\"". $song->getId() ."\", tempPlaylist, true)'>
                    <span class='trackNumber'>$i</span>
                </div>
                <div class='trackInfo'>
                    <span class='tName'>" . $song->getArtist()->getName() . '<br>' . "</span>
                    <div class='trackOptions'>
                    <img class='optionBtn' src='assets/icons/more.png'>
                </div>
                    <span class='tAlbum'>" . $song->getTitle() . "</span>
                <div class='trackDuration'>
                    <span class='duration'>" . $song->getDuration() . "</span>
                </div>
                </div>
                
                </li>";
                $i = $i + 1;
        }
        ?>
        <script>
            tempSongs = '<?php echo json_encode($songIdArray);?>';
            tempPlaylist = JSON.parse(tempSongs);
        </script>
    </ul>
</div>

<nav class="optionsM">
    <input type="hidden" class="songID">
    <div class="item">add to playlist</div>
    <div class="item">item 2</div>
    <div class="item">item 3</div>
</nav>