// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('jukebox-player', {
        height: '236',
        width: '408',
        videoId: '',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }

    });
}

function onPlayerStateChange(event) {
    if (player.getVideoData().title != "" && event.data != YT.PlayerState.ENDED)
        document.getElementById('jukebox-current').innerHTML = player.getVideoData().title;


    if (event.data != YT.PlayerState.PLAYING) {
        document.getElementById('jukebox-current').innerHTML = "No Video";
        //document.getElementById('jukebox-next').innerHTML = "<span class=>Use <b>:play</b></span> to start a video.";
    }
}

function onPlayerReady(event) {
    event.target.playVideo();
}