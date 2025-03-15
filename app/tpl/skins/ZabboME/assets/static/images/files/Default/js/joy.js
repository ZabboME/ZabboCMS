var refreshId = setInterval(function()

	{
	
	$('span.user_count_refresh').load('http://wabbo.me/users/count').show();

	}, 60);

	function newPopup(url) {
	popupWindow = window.open(url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes')
}

$(document).ready(function() {

var currentPosition = 0;

var slideWidth = 592;

var slides = $('.joy_slides');

var numberOfSlides = slides.length;

var slideShowInterval;

var speed = 6000;

slideShowInterval = setInterval(changePosition, speed);

slides.wrapAll('<div class="slide_holder"></div>')

slides.css({ 'float' : 'left' });

$('.slide_holder').css('width', slideWidth * numberOfSlides);

$('.joy_slider')

.prepend('<span class="nav" id="nav_left">Move Left</span>')

.append('<span class="nav" id="nav_right">Move Right</span>');

manageNav(currentPosition);

$('.nav').bind('click', function() {

currentPosition = ($(this).attr('id')=='nav_right')

? currentPosition+1 : currentPosition-1;

manageNav(currentPosition);

clearInterval(slideShowInterval);

slideShowInterval = setInterval(changePosition, speed);

		moveSlide();

	});

	

	function manageNav(position) {
	
	if(position==0){ $('#nav_left').hide() }
	
	else { $('#nav_left').show() }
	
	if(position==numberOfSlides-1){ $('#nav_right').hide() }
	
	else { $('#nav_right').show() }
}

function changePosition() {

if(currentPosition == numberOfSlides - 1) {

currentPosition = 0;

manageNav(currentPosition);

} else {

currentPosition++;

manageNav(currentPosition);

}

moveSlide();

}

function moveSlide() {

$('.slide_holder')

.animate({'marginLeft' : slideWidth*(-currentPosition)});

}

});

$(document).ready(function()

{

$(".home").click(function()

{

		if($('#sub_home').is(':visible') == true) 

		{ 

			$("#sub_home").slideUp(300); 

		}
	
	else 

		{ 
	
	if($('#sub_community').is(':visible') == true) 

			{
	
	$("#sub_community").slideUp(300, function() { $("#sub_home").slideDown(300) });  

			}

			else if($('#sub_staff').is(':visible') == true) 

			{

				$("#sub_staff").slideUp(300, function() { $("#sub_home").slideDown(300) });  

			}

			else if($('#sub_shop').is(':visible') == true) 

			{

				$("#sub_shop").slideUp(300, function() { $("#sub_home").slideDown(300) });  

			}

			else if($('#sub_forum').is(':visible') == true) 

			{

				$("#sub_forum").slideUp(300, function() { $("#sub_home").slideDown(300) });  

			}

			else 

			{

				$("#sub_home").slideDown(300);

			}

		}

	});



	$("li.community").click(function()

	{

		if($('#sub_community').is(':visible') == true) 

		{ 

			$("#sub_community").slideUp(300); 

		}

		else 

		{ 

			if($('#sub_home').is(':visible') == true) 

			{

				$("#sub_home").slideUp(300, function() { $("#sub_community").slideDown(300) });  

			}

			else if($('#sub_staff').is(':visible') == true) 

			{

				$("#sub_staff").slideUp(300, function() { $("#sub_community").slideDown(300) });  

			}

			else if($('#sub_shop').is(':visible') == true) 

			{

				$("#sub_shop").slideUp(300, function() { $("#sub_community").slideDown(300) });  

			}

			else if($('#sub_forum').is(':visible') == true) 

			{

				$("#sub_forum").slideUp(300, function() { $("#sub_community").slideDown(300) });  

			}

			else 

			{

				$("#sub_community").slideDown(300);

			}		

		}

	});		



	$("li.staff").click(function()

	{

		if($('#sub_staff').is(':visible') == true) 

		{ 

			$("#sub_staff").slideUp(300); 

		}

		else 

		{ 

			if($('#sub_home').is(':visible') == true) 

			{

				$("#sub_home").slideUp(300, function() { $("#sub_staff").slideDown(300) });  

			}

			else if($('#sub_community').is(':visible') == true) 

			{

				$("#sub_community").slideUp(300, function() { $("#sub_staff").slideDown(300) });  

			}

			else if($('#sub_shop').is(':visible') == true) 

			{

				$("#sub_shop").slideUp(300, function() { $("#sub_staff").slideDown(300) });  

			}

			else if($('#sub_forum').is(':visible') == true) 

			{

				$("#sub_forum").slideUp(300, function() { $("#sub_staff").slideDown(300) });  

			}

			else 

			{

				$("#sub_staff").slideDown(300);

			}	

		}

	});		



	$("li.shop").click(function()

	{

		if($('#sub_shop').is(':visible') == true) 

		{ 

			$("#sub_shop").slideUp(300); 

		}

		else 

		{ 

			if($('#sub_home').is(':visible') == true) 

			{

				$("#sub_home").slideUp(300, function() { $("#sub_shop").slideDown(300) });  

			}

			else if($('#sub_community').is(':visible') == true) 

			{

				$("#sub_community").slideUp(300, function() { $("#sub_shop").slideDown(300) });  

			}

			else if($('#sub_staff').is(':visible') == true) 

			{

				$("#sub_staff").slideUp(300, function() { $("#sub_shop").slideDown(300) });  

			}

			else if($('#sub_forum').is(':visible') == true) 

			{

				$("#sub_forum").slideUp(300, function() { $("#sub_shop").slideDown(300) });  

			}

			else 

			{

				$("#sub_shop").slideDown(300);

			}	

		}

	});		



	$("li.forum").click(function()

	{

		if($('#sub_forum').is(':visible') == true) 

		{ 

			$("#sub_forum").slideUp(300); 

		}

		else 

		{ 

			if($('#sub_home').is(':visible') == true) 

			{

				$("#sub_home").slideUp(300, function() { $("#sub_forum").slideDown(300) });  

			}

			else if($('#sub_community').is(':visible') == true) 

			{

				$("#sub_community").slideUp(300, function() { $("#sub_forum").slideDown(300) });  

			}

			else if($('#sub_staff').is(':visible') == true) 

			{

				$("#sub_staff").slideUp(300, function() { $("#sub_forum").slideDown(300) });  

			}

			else if($('#sub_shop').is(':visible') == true) 

			{

				$("#sub_shop").slideUp(300, function() { $("#sub_forum").slideDown(300) });  

			}

			else 

			{

				$("#sub_forum").slideDown(300);

			}	

		}

	});	



});	



$(function() {

    $("#radio_toggle").click(function() {

        var song = document.getElementById('joy_radio');

        if (song.paused)

        {

            song.play();

			$(this).html("<button class='radio_pause'></button>");

  		}

        else

        {

        	song.pause();

			$(this).html("<button class='radio_play'></button>");

        }

    });									    

    $(".radio_volume_up").click(function() {

        var song = document.getElementById('joy_radio');

        song.volume+=0.1;

    });									    

    $(".radio_volume_down").click(function() {

        var song = document.getElementById('joy_radio');

        song.volume-=0.1;

    });

});		



$(document).ready(function() { 

	$(".comment_close").click(function () {   

		$('.comment_overlay').fadeOut();

	});

	$("div.content_error").click(function () {   

		$('.content_title.error').fadeOut();

	});

	$("span.content_error").click(function () {   

		$('#content_error.content_full').fadeOut();

	});

	$(".content_success").click(function () {   

		$('.content_title.success').fadeOut();

	});

    $(".content_title.error").fadeIn("slow");

    $(".content_title.success").fadeIn("slow");

	$("#confirm_changes").click(function () {   

		return confirm('Are you sure you want to make these changes?');

	});

	$("#show_comment").click(function () { 

		$('.comment_overlay').fadeIn();

	});



});



function previewAvatar(el)

{

    $('.selected_avatar').html('<img class="selected_avatar_display" src="./avatar.php?look=' + el + '&direction=4&head_direction=4&size=l">');

    document.getElementById('rAvatar').value = '' + el + '';

}



var tinychat={room:"wabbo",colorbk:"0xffffff",join:"auto",api:"list"};



if(navigator.userAgent.toLowerCase().indexOf("chrome")>=0)

{

	var _interval=window.setInterval(function()

	{

		var autofills=$('input:-webkit-autofill');if(autofills.length>0)

		{

			window.clearInterval(_interval);autofills.each(function()

				{

					var clone=$(this).clone(true,true);$(this).after(clone).remove();

				});

		}

	},20);

}



function previewTS(el)

{

	document.getElementById('news_preview').innerHTML = '<img src="http://wabbo.me/Files/Other/News/' + el + '" />';

}



function suggestSEO(el)

{

	var suggested = el;

	

	suggested = suggested.toLowerCase();

	suggested = suggested.replace(/^\s+/, ''); 

	suggested = suggested.replace(/\s+$/, '');

	suggested = suggested.replace(/[^a-z 0-9]+/g, '');

	

	while (suggested.indexOf(' ') > -1)

	{

		suggested = suggested.replace(' ', '-');

	}

	

	document.getElementById('url').value = suggested;

}

