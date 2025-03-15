$(window).scroll(function() {
    if ($(window).scrollTop() > 200) {
        $('.scrollTop').fadeIn();
    } else {
        $('.scrollTop').fadeOut('slow');
    }
});


$(document).ready(function() {
    $("#logo").bind({
        mouseenter: function() {
            $("#logo").animate({
                opacity: 0.3
            }, 600);
        },
        mouseout: function() {
            $("#logo").animate({
                opacity: 1
            }, 500);
        }
    })
});

correr = 3;
repeat = 80;

function headerh() {
    correr += 1;
    $("headerh").css("background-position", correr + "px 0px");
}

setInterval("headerh()", repeat)