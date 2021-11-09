let currentPlaylist = new Array();
let audioElement;

function formatTime(param){
    let time = Math.round(param);
    let minutes = Math.floor(time / 60);
    let seconds = time - (minutes * 60);
    if(seconds < 10){
        zero = "0";
    }
    else{
        zero = "";
    }
    return minutes + ":" + zero + seconds;
}

function updateTime(audio){
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));
}

function Audio(){
    this.currentlyPlaying;
    this.audio = document.createElement('audio');
    this.audio.addEventListener("canplay", function(){
        $(".progressTime.remaining").text(formatTime(this.duration));
    });

    this.audio.addEventListener("timeupdate", function(){
        if(this.duration){
            updateTime(this);
        }
    });

    this.setTrack = function(track){
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function(){
        this.audio.play();
    }

    this.pause = function(){
        this.audio.pause();
    }
}