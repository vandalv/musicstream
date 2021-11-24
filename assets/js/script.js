var currentPlaylist = new Array();
var shufflePlaylist = new Array();
var tempPlaylist = new Array();
var audioElement;
var mouseEvent = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var loggedUser;
var tempSongs;

$(document).click(function(click) {
    var target = $(click.target);
    if(!target.hasClass("itemm") && (!target.hasClass("optionBtn"))){
        hideOptionsMenu();
    }
});

$(window).scroll(function() {
    hideOptionsMenu();
});

$(document).on("change", "select.playlist", function(){
    var playlistId = $(this).val();
    var songId = $(this).prev(".songId").val();
    $.post("includes/ajax/addToPlaylist.php", {playlistId: playlistId, songId: songId})
    .done(function(){
        hideOptionsMenu();
        $(this).val("");
    });
});

function openPage(url){
    if(url.indexOf("?") == -1){
        url = url + "?";
    }
    var encodedUrl = encodeURI(url + "&loggedUser=" + loggedUser);
    $("#pageContent").load(encodedUrl);
    $("body").scrollTop(0);
    history.pushState(null,null,url);
}

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

function deletePlaylist(playlistId){
    var dp = confirm("Are you sure you want to delete playlist?");
    if(dp){
        $.post("includes/ajax/deletePlaylist.php", {playlistId:playlistId})
        .done(function(){
            openPage("musicLibrary.php");
        });
    }
}

function updateEmail(email){
    var emailVal = $("." + email).val();
    $.post("includes/ajax/updateEmail.php", {email:emailVal, username: loggedUser})
    .done(function(response){
        $("." + email).nextUntill(".message").text(response);
    })
}

function logOut(){
    $.post("includes/ajax/logOut.php", function(){
        location.reload();
    });
}

function playFirstSong(){
    setTrack(tempPlaylist[0], tempPlaylist, true);
}

function removeFromPlaylist(button, playlistId){
    var songId = $(button).prevAll(".songId").val();
    $.post("includes/ajax/removeFromPlaylist.php", {playlistId:playlistId, songId:songId})
        .done(function(){
            openPage("playlist.php?id=" + playlistId);
        });
}

function createPlaylist(){
    console.log(loggedUser);
    var alert = prompt("Enter Playlist Name:");
    if(alert != ""){
        $.post("includes/ajax/createPlaylist.php", {name: alert, username:loggedUser})
        .done(function(){
            openPage("musicLibrary.php");
        });
    }
}

function hideOptionsMenu(){
    var menu = $(".optionsM");
    if(menu.css("display") != "none"){
        menu.css("display", "none");
    }
}

function showOptionsMenu(button){
    var songId = $(button).prevAll(".songId").val();
    var menu= $(".optionsM");
    var menuWidth = menu.width();
    menu.find(".songId").val(songId);
    var scrollTop = $(window).scrollTop();
    var elementOffSet = $(button).offset().top;
    var top = elementOffSet - scrollTop;
    var left = $(button).position().left;
    
    menu.css({"top": top + "px", "left": left + "px", "display": "inline", "transition": "2s"});
}

function updateTime(audio){
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));
    let progress = audio.currentTime / audio.duration * 100;
    $(".playbackBar .timeBarProgress").css("width", progress + "%");
}

function updateVolume(audio){
    let volume = audio.volume * 100;
    $(".volumeBar .timeBarProgress").css("width", volume + "%");

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

    this.audio.addEventListener("ended", function() {
        nextSong();
    });

    this.audio.addEventListener("volumechange", function(){
            updateVolume(this);
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

    this.setTime = function(seconds){
        console.log(seconds);
        this.audio.currentTime = seconds;
    }
}