$(document).ready(function() {
    $("head").append('<audio src="https://radioserver.itspower.net/radio/8000/radio.mp3" autostart="1"></audio><audio src="https://radioserver.itspower.net/radio/8000/radio.mp3" autoplay="0" autostart="1" muted="0"></audio> <style>.goto:hover{opacity:0.4;cursor:pointer;}.goto{transition:0.3s;}.exit:hover{opacity:0.4;cursor:pointer;}.exit{transition:0.3s;}.radiobutton{display:inline-block;font-size:11.5px;color:white;text-shadow:0px 1px #000;margin-right:8px;}</style>'), 
	$("head").append('<link rel="stylesheet" type="text/css" media="screen" href="_assets/main.css?1" /><link rel="stylesheet" type="text/css" href="_assets/ClientPlayer.css?1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css" /><link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />'), 
	$("head").append('<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>'), 
	$("body").prepend('<div class="playerbox" id="hide" style="display:show;"><div id="radioPlayer"><div id="playerdiv"><audio id="player" autostart="1" autoplay="0"><source src="https://radioserver.itspower.net/radio/8000/radio.mp3" autoplay="1" type="audio/mp3"><source src="https://radioserver.itspower.net/radio/8000/radio.mp3" type="audio/mpeg"></audio><div class="radiobutton" style="margin-left: 51px;-webkit-user-select:none;-moz-user-select:none;"></div><div class="radiobutton" id="play" onclick="Play()" style="margin-top:-3px;display: none;border-radius:3px 0px 0px 3px;-webkit-user-select:none;-moz-user-select:none;" class="radiobutton" data-tooltip="Player aanzetten"><i class="fa fa-play"></i></div><div class="radiobutton" id="pause" onclick="Pause()" style="margin-top:-3px;display: inline-block;border-radius:3px 0px 0px 3px;-webkit-user-select:none;-moz-user-select:none;" class="radiobutton" data-tooltip="Player uitzetten"><i class="fa fa-pause"></i></div><div class="radiobutton" onclick="VolUp()" style="margin-top: -3px;"><i class="fa fa-volume-down" style="margin-left: 8px;"></i></div><div class="radiobutton" onclick="VolDown()" style="margin-left: 9px;"><i class="fa fa-volume-up"></i></div><div style="font-size:10px;color:white;font-family:Tahoma;text-shadow: 0px 1px #000;margin-top: 8px;margin-left: 17.5px;-webkit-user-select:none;-moz-user-select:none;">Tuned into <i class="fa fa-fire"></i>&nbsp;<b>ItsPower.NET</b></div><img src="select:none;-moz-user-select:none;" class="radiobutton" data-tooltip="Player aanzetten"><i class="fa fa-play"></i></div><div class="radiobutton" id="pause" onclick="Pause()" style="margin-top:-3px;display: inline-block;border-radius:3px 0px 0px 3px;-webkit-user-select:none;-moz-user-select:none;" class="radiobutton" data-tooltip="Player uitzetten"><i class="fa fa-pause"></i></div><div class="radiobutton" onclick="VolUp()" style="margin-top: -3px;"><i class="fa fa-volume-down" style="margin-left: 8px;"></i></div><div class="radiobutton" onclick="VolDown()" style="margin-left: 9px;"><i class="fa fa-volume-up"></i></div><div style="font-size:10px;color:white;font-family:Tahoma;text-shadow: 0px 1px #000;margin-top: 8px;margin-left: 17.5px;-webkit-user-select:none;-moz-user-select:none;">Tuned into <i class="fa fa-fire"></i>&nbsp;<b>ItsPower.NET</b></div><img src="/_assets/images/client_player/client_reload.png?1529973394" class="exit" onclick="reload();" style="margin-top:0px;margin-bottom: -15px;margin-left: 88px;-webkit-user-select:none;-moz-user-select:none;"></img><img src="/_assets/images/client_player/client_exit.png?1529973310" class="exit" onClick="exit()" style="margin-left: 2px;margin-bottom: -15px;-webkit-user-select:none;-moz-user-select:none;"></img> <a href="#requestModal" rel="modal:open"><img src="/_assets/images/client_player/client_request.png?1529973394" class="exit" style="margin-top:0px;margin-bottom: -15px;margin-left: -103px;-webkit-user-select:none;-moz-user-select:none;"></img></a><a href="https://itspower.net/splash" target="_blank"><img src="/_assets/images/client_player/client_goto.png?1529973394" class="exit" style="margin-top:0px;margin-bottom: -15px;margin-left: -77px;-webkit-user-select:none;-moz-user-select:none;"></img></a></div></div></div><div id="code"></div><div id="modals"><div id="requestModal" class="modal"><div id="requestHeader">Request Line</div><div id="requestField"><input name="requestUser" id="requestUser" placeholder="Name" required> <select name="requestType" id="requestType" required><option value="0" disabled="" selected="">Message Type</option><option value="1">Song Request</option><option value="2">Shoutout</option><option value="3">Competition</option></select><div id="inputContainer"><textarea name="requestMessage" id="requestMessage" placeholder="Message (optional)" style="width:283px !important;" ></textarea></div><button id="requestButton requestAjax" onclick="request();" style="width: 295px !important;">Request</button></div></div>'), 
	$("head").append('<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">')
    document.getElementById('player').play();
});


function reload()
    {
        $('audio').attr('src', null);
        $('audio').attr('src','https://radioserver.itspower.net/radio/8000/radio.mp3');
        setTimeout(function(){
        },250);    

    }

function exit() {
    document.getElementById('player').pause();
    document.getElementById('hide').style.display = 'none';
}


function Play() {
    document.getElementById('player').play();
    document.getElementById('play').style.display = 'none';
    document.getElementById('pause').style.display = 'inline-block'
}

function Pause() {
    document.getElementById('player').pause();
    document.getElementById('play').style.display = 'inline-block';
    document.getElementById('pause').style.display = 'none'
}

function VolUp() {
    document.getElementById('player').volume -= 0.1
}

function VolDown() {
    document.getElementById('player').volume += 0.1
}

  function request() {
    $("#requestAjax").prop("onclick", null).off("click");
  jQuery.ajax({
      url: "/_include/request.php",
      data:{
      requestUser: $("#requestUser").val(),
      requestType: $("#requestType").val(),
      requestMessage: $("#requestMessage").val()
    },
    type: "POST",
    success:function(data){
    $.modal.close();
    toastr.success('Request sent!', 'SUCCESS');
    $("#requestUser").val("");
    $("#requestMessage").val("");
    $("#requestAjax").prop("onclick", null).on("click");
    },
    error: function(obj,text,error) {
      toastr.error(obj.responseText, 'ERROR');
    }
  });
}
