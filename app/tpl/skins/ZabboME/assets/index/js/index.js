function changeAvatar(value, target) {  
	target = $(target);
	if(value.length != 0){
		target.css("background-image", "url(/username/" + value + "&action=wav&direction=2&head_direction=3&gesture=sml");
	}
}
