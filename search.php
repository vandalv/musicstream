<?php 
    include("includes/includedFiles.php");
    if(isset($_GET['searchTerm'])){
        $searchTerm = urldecode($_GET['searchTerm']);
    }
    else{
        $searchTerm = "";
    }
    $loggedUs = $_SESSION['userLoggedIn'];
?>

<div class="searchContainer">
    <input type="text" class="searchInput" onchange='val' id="searchI" required value="<?php echo $searchTerm;?>">
    <label for="sin" class="form__label">Search For Artist, Album Or Playlist:</label>
</div>

<script>
    var timer;
    var val;
    $(".searchInput").focus();
    $(".searchInput").keyup(function(){
        clearTimeout(timer);

        timer = setTimeout(function(){
            val = $(".searchInput").val();
            openPage("search.php?searchTerm=" + val);
        }, 2000);
    })
    $(".searchInput").val(val);
</script>

<?php 
    if($searchTerm == ""){
        exit();
    }
?>

<div class="trackContainer">
    <ul class="trackList">
        <?php 
        $songQuery = mysqli_query($dbconnect, "SELECT * FROM songs WHERE title LIKE '$searchTerm%' LIMIT 10");
        $songIdArray = array();
        $i = 1;
        echo "<h1 class='h1Songs'>SONGS</h1>";
        if(mysqli_num_rows($songQuery) == 0){
            echo "<h2 class='h2Songs'>No Matches</h2>";
        }
        while($row = mysqli_fetch_array($songQuery)){
            if($i > 3){
                break;
            }
            array_push($songIdArray, $row['id']);
            $song = new Song($dbconnect, $row['id']);
            echo "<li class='tracklistRow'>
                <div class='trackCount'>
                    <img class='play' src='assets/icons/play-white.png' onclick='setTrack(\"". $song->getId() ."\", tempPlaylist, true)'>
                    <span class='trackNumber'>$i</span>
                </div>
                <div class='trackInfo'>
                    <span class='tName'>" . $song->getArtist()->getName() . '<br>' . "</span>
                    <span class='tAlbum'>" . $song->getTitle() . "</span>
                    <div class='trackOptions'>
                    <input type='hidden' class='songId' value='" . $song->getId() ."'>
                    <img class='optionBtn' src='assets/icons/more.png' onclick='showOptionsMenu(this)'>
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

<div class="artistCont">
    <h1 class='h1Songs'>Artists</h1>
    <?php 
        $artistQuery = mysqli_query($dbconnect, "SELECT * FROM artists WHERE name LIKE '$searchTerm%' LIMIT 10");
        if(mysqli_num_rows($artistQuery) == 0){
            echo "<h2 class='h2Songs'>No Matches</h2>";
        }
        while($row = mysqli_fetch_array($artistQuery)){
            $artistFound = new Artist($dbconnect, $row['id']);
        
        echo "<div class='searchRowResult'>
                <div class='artistName'>
                        <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() ."\")'>
                            "
                            . $artistFound->getName() .
                            "
                        </span>
                </div>
            </div>";
        }
        
    ?>
</div>

<div class="gridContainerd">
<h1 class='h1Songs'>Albums</h1>
    <?php 
        $albumQuery = mysqli_query($dbconnect, "SELECT * FROM albums WHERE title LIKE '$searchTerm%' LIMIT 10");
        if(mysqli_num_rows($albumQuery) == 0){
            echo "<h2 class='h2Songs'>No Matches</h2>";
        }
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
<nav class="optionsM">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($dbconnect, $loggedUs);?>
</nav>