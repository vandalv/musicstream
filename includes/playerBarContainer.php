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
        setTrack(currentPlaylist[0], currentPlaylist, false);
        updateVolume(audioElement.audio);
        console.log(audioElement.audio);
        $("#playerBarContainer").on("mousedown touchstart mousemove touchmove", function(e){
            e.preventDefault();
        });
        $(".playbackBar .timeBar").mousedown(function(){
            mouseEvent = true;
        });
        $(".playbackBar .timeBar").mousemove(function(e){
            if(mouseEvent){
                mouseGetTime(e, this);
            }
        });
        $(".playbackBar .timeBar").mouseup(function(e){
            mouseGetTime(e, this);
        });
        $(document).mouseup(function(){
            mouseEvent = false;
        });


        $(".volumeBar .timeBar").mousedown(function(){
            mouseEvent = true;
        });
        $(".volumeBar .timeBar").mousemove(function(e){
            if(mouseEvent){
                let percent = e.offsetX / $(this).width();
                if(percent >=0 && percent <=1){
                    audioElement.audio.volume = percent;
                } 
            }
        });
        $(".volumeBar .timeBar").mouseup(function(e){
            if(mouseEvent){
                let percent = e.offsetX / $(this).width();
                if(percent >=0 && percent <=1){
                    audioElement.audio.volume = percent;
                } 
            }
        });
        $(document).mouseup(function(){
            mouseEvent = false;
        });
    });

    function mouseGetTime(mouse, timeBar){
        let percent = mouse.offsetX / $(timeBar).width() * 100;
        let seconds = audioElement.audio.duration * (percent / 100);
        audioElement.setTime(seconds);
    }

    function setTrack(trackId, newPlayList, play){
        $.post("includes/ajax/getSong_json.php", {songId: trackId}, function(data){
            let track = JSON.parse(data);
            $(".track span").text(track.title);
            $.post("includes/ajax/getArtist_json.php", {artistId: track.artist}, function(data){
            let artist = JSON.parse(data);
            $(".artist span").text(artist.name);
            });
            $.post("includes/ajax/getAlbum_json.php", {albumId: track.album}, function(data){
            let album = JSON.parse(data);
            $(".albumCover img").attr("src", album.artworkPath);
            });
            audioElement.setTrack(track);
            playSong();
        });
        if(play){
            audioElement.play();
        }
    }

    function playSong(){
        if(audioElement.audio.currentTime == 0){
            $.post("includes/ajax/playCount.php", {songId: audioElement.currentlyPlaying.id});
        }
        else{
            console.log("dont update");
        }
            $(".controlButton.play").hide();
            $(".controlButton.pause").show();
            audioElement.play();
        }
        function pauseSong(){
            $(".controlButton.pause").hide();
            $(".controlButton.play").show();
            audioElement.pause();
        }
</script>

<div id="playerBarContainer">
    <div id="playerBar">
    <div id="leftPB">
        <div class="content">
            <span class="albumCover">
                <img src="" class="albumArtwork">
            </span>
            <div class="trackInfo">
                <span class="artist">
                    <span></span>
                </span>
                <span class="track">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
    <div id="centerPB">
        <div class="content playerControls">
            <div class="btns">
                <button class="controlButton shuffle"><img src="assets/icons/shuffle.png" alt="shuffle"></button>
                <button class="controlButton previous"><img src="assets/icons/previous.png" alt="previous"></button>
                <button class="controlButton play" onclick="playSong()"><img src="assets/icons/play.png" alt="play"></button>
                <button class="controlButton pause" style="display:none" onclick="pauseSong()"><img src="assets/icons/pause.png" alt="pause"></button>
                <button class="controlButton next"><img src="assets/icons/next.png" alt="next"></button>
                <button class="controlButton repeat"><img src="assets/icons/repeat.png" alt="repeat"></button>
            </div>
            <div class="playbackBar">
            <span class="progressTime current">0:00</span>
            <div class="timeBar">
                <div class="timeBarBG">
                    <div class="timeBarProgress"></div>
                </div>
            </div>
            <span class="progressTime remaining"></span>
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