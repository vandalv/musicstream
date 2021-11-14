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
        $username = $loggedUser->getUsername();
        $plQuery = mysqli_query($dbconnect, "SELECT * FROM playlists WHERE owner='$username'");
        if(mysqli_num_rows($plQuery) == 0){
            echo "<h2 class='h2Songs'>No Playlists Exist Yet</h2>";
        }
        while($row = mysqli_fetch_array($plQuery)){
            echo "<div class='itemViewer'>
                <div class='infoViewer'>                  
                    {$row['title']}              
                </div>
            </div>";
        }
    ?>
    </div>
</div>