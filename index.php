
<?php
include("includes/config.php");
if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else{
    header('Location: registration.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Mucic Stream</title>
</head>
<body>
    <div id="mainContainer">
        <div id="topContainer">
            <div id="navBarContainer">
                <nav class="navBar">
                    <a href="index.php" class="logo">
                        <img src="assets/icons/logo.png">
                    </a>
                    <div class="group">
                        <div class="navItem">
                            <a href="search.php" class="navItemLink">Search<img src="assets/icons/search.png" class="icon" alt="search"></a>
                        </div>
                    </div>
                    <div class="group">
                        <div class="navItem">
                            <a href="browse.php" class="navItemLink">Browse</a>
                        </div>
                        <div class="navItem">
                            <a href="musiclibrary.php" class="navItemLink">Music Library</a>
                        </div>
                        <div class="navItem">
                            <a href="profile.php" class="navItemLink">User Profile</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div id="playerBarContainer">
            <div id="playerBar">
            <div id="leftPB">
                <div class="content">
                    <span class="albumCover">
                        <img src="assets/albumCovers/Paper_Planes_-_Simple_Things.jpg" class="albumArtwork">
                    </span>
                    <div class="trackInfo">
                        <span class="artist">
                            <span>Paper Planes</span>
                        </span>
                        <span class="track">
                            <span>The Best Thing</span>
                        </span>
                    </div>
                </div>
            </div>
            <div id="centerPB">
                <div class="content playerControls">
                    <div class="btns">
                        <button class="controlButton shuffle"><img src="assets/icons/shuffle.png" alt="shuffle"></button>
                        <button class="controlButton previous"><img src="assets/icons/previous.png" alt="previous"></button>
                        <button class="controlButton play"><img src="assets/icons/play.png" alt="play"></button>
                        <button class="controlButton pause" style="display:none"><img src="assets/icons/pause.png" alt="pause"></button>
                        <button class="controlButton next"><img src="assets/icons/next.png" alt="next"></button>
                        <button class="controlButton repeat"><img src="assets/icons/repeat.png" alt="repeat"></button>
                    </div>
                    <div class="playbackBar">
                    <span class="progressTime current">0.00</span>
                    <div class="timeBar">
                        <div class="timeBarBG">
                            <div class="timeBarProgress"></div>
                        </div>
                    </div>
                    <span class="progressTime remaining">0.00</span>
                    </div>
                </div>
            </div>
            <div id="rightPB">
            <div class="volumeBar">
                        <button class="controlButton volume"><img src="assets/icons/volume.png" alt="volume"></button>
                        <div class="timeBar">
                        <div class="timeBarBG">
                            <div class="timeBarProgress"></div>
                        </div>
                    </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>