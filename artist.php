<?php 
    include("includes/includedFiles.php");
    include("includes/config.php");
    if(isset($_GET['id'])){
        $idArtist =  $_GET['id'];
    }
    else{
        echo "No index set";
    }
    $artist = new Artist($dbconnect, $idArtist);
?>

<div class="albumInfoHead borderBottom">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName(); ?></h1>
            <div class="hButtons">   
                <button class="button" onclick="playFirstSong()">PLAY</button>
            </div>
        </div>
    </div>
</div>
<div class="trackContainerd">
    <ul class="trackList">
        <?php 
        $songIdArray = $artist->getSongIds();
        $i = 1;
        foreach($songIdArray as $idSong){
            if($i > 4){
                break;
            }
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
<div class="gridContainerd">
    <?php 
        $albumQuery = mysqli_query($dbconnect, "SELECT * FROM albums WHERE artist='$idArtist'");
        while($row = mysqli_fetch_array($albumQuery)){
            echo "<div class='itemViewer'>
            <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
                <img src='{$row['artworkPath']}'>              
                <div class='infoViewer'>                  
                    {$row['title']}              
                </div> 
            </span>
            </div>";
        }
    ?>
</div>