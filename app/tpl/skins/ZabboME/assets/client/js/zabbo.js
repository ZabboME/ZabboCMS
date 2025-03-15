(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-100554816-1', 'auto');
ga('send', 'pageview');


$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
});

function loadInfos() {

    var url = window.location.href;

    var parameter = url.split("/");
    var sendparamenter = false;
    if (parameter[3] == "me") {
        var current_price = $(".rareauctionprice").html();
        if (current_price) {
            sendparamenter = current_price;
        } else {
            sendparamenter = 0;
        }
    }


    $.post("/Infos", { rareauction: sendparamenter })
        .done(function(data) {
            var json = jQuery.parseJSON(JSON.stringify(data));
            $("user").html(json.users);
            if (json.users == 1) {
                $("desc").html('Member Online!');
            } else {
                $("desc").html('Member(s) Online!');
            }

            if (json.rareauction) {
                if (json.rareauction.username) {
                    $(".rareauctionusername").html(json.rareauction.username);
                    $(".rareauctionprice").html(json.rareauction.count_format);
                    $(".rareauctionwindow").css('background', 'url(' + json.rareauction.look + ')  10px 0% no-repeat');
                }
            }



            if (json.alert) {
                NotifyUser(json.alert.icon, json.alert.title, json.alert.body, json.alert.url);
            }
        });
}


function LoadStaffInfos() {
    $.post("/Infos", { staff: true })
        .done(function(data) {
            var json = jQuery.parseJSON(JSON.stringify(data));
            $("user").html(json.users);

            if (!($(".dropdown.staff").length)) {

                $(".nav.navbar-nav.mr-auto").append("<li class='dropdown staff'></li>");
                $("li.dropdown.staff").append("<div class='arrow'></div>");
                if (json.staff.total == 0) {
                    $("li.dropdown.staff").append('<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Zabbo Staff <span class="label label-primary">0</span> <span class="caret"></span></a>');
                } else {
                    $("li.dropdown.staff").append('<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Zabbo Staff <span class="label label-danger">' + json.staff.total + '</span> <span class="caret"></span></a>');
                }

                $("li.dropdown.staff").append('<ul class="dropdown-menu"></li>');
                
            }
        });
}



function LogoutMe() {
    swal({
            title: "Are you sure?",
            text: "As soon as you logout, you will automatically be logged out of the client and have to login again on the start page!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Logout!",
            cancelButtonText: "No, stay logged in",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                swal("Request sent!", "Your request to logout was successfully!", "success");
                window.location = "/logout";
            } else {
                swal("Canceled!", "You were not logged out.", "error");
            }

        });
}


function popup(width, height, url) {
    var width = width;
    var height = height;
    var url = url;
    $("body").append('<div id="popup"></div>');
    $("#popup").append('<div id="makeblack"></div>');
    $("#popup").append('<div id="alert" style="width: ' + width + 'px;height: ' + height + 'px;"></div>');
    $("#popup #alert").load(url);
}


function HabboBlocked() {
    $("#column.footer .big").load("/HabboAvatarAPIBlocked");
}