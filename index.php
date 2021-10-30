
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
    <div id="playerBarContainer">
        <div id="playerBar">
        <div id="leftPB">
            <div class="content">
                <span class="albumCover">
                    <img src="assets/albumCovers/Paper_Planes_-_Simple_Things.jpg" class="albumArtwork">
                </span>
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
        <div id="rightPB"></div>
        </div>
    </div>
</body>
</html>