<?php 
include("includes/includedFiles.php");
if(isset($_GET['id'])){
    $idPlaylist =  $_GET['id'];
}
else{
    header("Location: index.php");
}

$playlist = new Playlist($dbconnect, $idPlaylist);
$owner = new User($dbconnect, $playlist->getOwner());
?>
<div class="albumInfoHead">
    <div class="leftSide">
        <img src="assets/icons/playlist.jpg">
    </div>
    <div class="rightSide">
        <h2><?php echo $playlist -> getName();?></h2>
        <h2 id="beGreen1">by <?php echo $playlist -> getOwner();?></h2>
        <p>Number Of Tracks:
            <?php 
            echo $playlist->numberOfSongs();
            ?>
        </p>
        <button class='button2' onclick="deletePlaylist()">Delete Playlist</button>
    </div>
</div>
<div class="trackContainer">
    <ul class="trackList">
        <?php 
        $songIdArray = $playlist->getSongId();
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
                    <span class='tAlbum'>" . $song->getTitle() . "</span>
                    <div class='trackOptions'>
                    <img class='optionBtn' src='assets/icons/more.png'>
                </div>
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
