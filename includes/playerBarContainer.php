<?php
$songQuery = mysqli_query($dbconnect, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
$resultArray = array();
while($row = mysqli_fetch_array($songQuery)) {
	array_push($resultArray, $row['id']);
}
$jsonArray = json_encode($resultArray);
?>
<script>
    $(document).ready(function(){
        currentPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
    });

    function setTrack(trackId, newPlayList, play){

    }
</script>

<div id="playerBarContainer">
    <div id="playerBar">
    <div id="leftPB">
        <div class="content">
            <span class="albumCover">
                <img src="assets\albumCovers\folk_genre_cover.jpg" class="albumArtwork">
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