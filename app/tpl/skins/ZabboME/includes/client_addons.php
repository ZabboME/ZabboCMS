<link rel="stylesheet" href="{cdnurl}/clientnew/client_plugins.css?v=<?php echo time() ?>" type="text/css"/>
<link rel="stylesheet" href="{cdnurl}/client/css/app.css?v=<?php echo time() ?>" type="text/css"/>
<script src="{cdnurl}/client/js/flashclient.js?v=<?php echo time() ?>" type="text/javascript"></script>
<script src="{cdnurl}/js/theme.js?v=<?php echo time() ?>" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="{cdnurl}/css/addon.css?v=<?php echo time() ?>">
<link type="text/css" rel="stylesheet" href="{cdnurl}/css/animate.min.css?v=<?php echo time() ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" type="text/javascript"></script>
<style>
#mydiv {
  position: absolute;
  z-index: 9;
}
#mydivheader {
  cursor: move;
  z-index: 10;
}
</style>

<div class="client-buttons" id="mydiv">
<button id="mydivheader" class="rounded-button blue plain" data-toggle="tooltip" data-placement="bottom" data-original-title="Drag / Move">
		<b class="fas fa-arrows-alt" aria-hidden="true"></b>
	</button>
	<button class="client-fullscreen rounded-button blue plain" onclick="setFullscreen()" data-toggle="tooltip" data-placement="bottom" data-original-title="FullScreen Mode">
		<b class="client-icon client-fullscreen-icon"></b>
	</button>
<button class="rounded-button blue plain" data-toggle="tooltip" data-placement="bottom" data-original-title="Hey {username}">
		<b class="fas fa-user" aria-hidden="true"></b>
			<font style="vertical-align: inherit;">
				<font style="vertical-align: inherit;"><script type="text/javascript">
                    $(document).ready(function() {
                        updateOnlineCount();

                        var auto_refresh = setInterval(function() {
                            updateOnlineCount();
                        }, 10000);

                        function updateOnlineCount() {
                            $.ajax({
                                url: '{api}/extra.php?action=getOnlineUsers',
                                dataType: 'json',
                                success: function(data) {
                                    $('#online-count').text(data.OnlineUsers);
                                },
                                error: function(error) {
                                    console.error('Error:', error);
                                }
                            });
                        }
                    });
</script>
<custom id="online-count"> </custom>
</font>
			</font>
	</button>
	<button class="rounded-button blue plain" onclick="window.open('{discord}', 'newwindow', 'width=300, height=265');" data-toggle="tooltip" data-placement="bottom" data-original-title="Join Our Discord">
		<b class="fab fa-discord" aria-hidden="true" style="font-style: normal;"> </b>
	</button>
</div>

<style>
#draggable {width:150px;height:150px;padding:0.5em;}

.alert .head .close1:hover {
    background: url(/app/tpl/skins/ZabboME/assets/client/icons/close_hover.png);
}
#boxxy {
	display: none;
}
.alert .head .close1 {
    float: right;
    background: url(/app/tpl/skins/ZabboME/assets/client/icons/close.png);
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 19px;
    height: 20px;
    cursor: pointer;
    margin-top: 3px;
    margin-right: 5px;
}

.close1 {
    float: right;
    background: url(/app/tpl/skins/ZabboME/assets/client/icons/close.png);
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 19px;
    height: 20px;
    cursor: pointer;
    margin-top: 5px;
    margin-right: 5px;
}

user agent stylesheet
div {
    display: block;
}

.alert .head {
    position: relative;
    background: #568ba4;
    height: 30px;
    line-height: 53px;
    color: #fff;
    text-align: center;
    font-size: 14px;
    width: 1028px;
    top: 0px;
    left: -1px;
    z-index: 93939;
    height: 55px;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
    border: 2px solid;
    border-color: #121518;
}

#98765501 {
	color: #000;
}

.theaterframe {
    background: url(https://imgur.com/I2DecXf.png);
    background-position: center;
    display: block;
    height: 693px;
    margin: auto;
    position: relative;
    width: 1028px;
    left: -1px;
}
.theaterframe_stage {
    height: 360px;
    margin: 145px 192px;
    position: absolute;
    width: 640px;
}
#chatbox {
	display: none;
}
.chatbtn {
    background-color: #10af38;
    border: none;
    color: #FFFFFF;
    font-weight: bold;
    padding: 20px;
    border-radius: 2px;
    margin-left: 10px;
	font-size: 14px;
    position: absolute;
	margin-top: 50px;
    padding-top: 14px;
    padding-bottom: 14px;
    cursor: pointer;
    box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.45), inset 0px -23px 0px 0px rgba(0,0,0,0.2);
}

.label-warning1 {
    position: absolute;
    background: #b53c3c;
    color: #FFF;
    top: 24px;
    left: 6px;
    width: fit-content;
    padding: 10px;
    border-radius: 5px;
}
.label-warning2 {
    position: absolute;
    background: #012f38;
    color: #FFF;
    top: 650px;
    float: right;
    left: 920px;
    width: fit-content;
    padding: 10px;
    border-radius: 5px;
}
.label-warning3 {
    position: absolute;
    background: #e3c91b;
    color: black;
    top: 370px;
    float: right;
    font-size: 11px;
    left: 100px;
    width: fit-content;
    padding: 10px;
    border-radius: 5px;
}
#MessageBox-Header {color: #000;}
</style>

<script>
	$
	(
	function() 
		{
		 $( "#draggable" ).draggable();
		} 
	);
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>
		$(document).ready(
    function() {
        $("#openmovies").click(function() {
            $("#boxxy").fadeToggle("slow");
        });
    });
</script>

<script>
dragElement(document.getElementById("mydiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>





