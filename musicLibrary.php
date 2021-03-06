<?php 
include("includes/includedFiles.php");
?>

<div class="playlistContainer">
    <div class="gridContainer">
        <h2 class="pl">Playlists</h2>
        <div class="buttonItems">
            <button class="button" onclick="createPlaylist()">New Playlist</button>
        </div>
        <?php 
        $usname = $_SESSION['userLoggedIn'];
        $plQuery = mysqli_query($dbconnect, "SELECT * FROM playlists WHERE owner='$usname'");
        if(mysqli_num_rows($plQuery) == 0){
            echo "<h2 class='h2Songs'>No Playlists Exist Yet '$usname'</h2>";
        }
        while($row = mysqli_fetch_array($plQuery)){
            $playlist = new Playlist($dbconnect, $row);
            echo "<div class='itemViewer' role='link' tabindex='0' onclick='openPage(\"playlist.php?id=" . $playlist->getId() ."\")'>
                <div class='plImage'>
                    <img src='assets/icons/playlist.jpg'>
                </div>
                <div class='infoViewer'>                  
                    {$playlist->getName()}              
                </div>
            </div>";
        }
    ?>
    </div>
</div>
