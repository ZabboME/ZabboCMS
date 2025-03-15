$(document).ready(function() {
	
var registerStyle = $(".roundedStyle").children("img").attr("alt");
$("#log-mail, #log-password").keypress(function(a) {
    13 == a.which && $("#InitLogin").trigger("click")
}), $("#forgot-mail").keypress(function(a) {
    13 == a.which && (a.preventDefault(), $("#doForgot").trigger("click"))
}), $("#reg-username").keypress(function(a) {
    13 == a.which && $("#doRegister").trigger("click")
}), $(".roundedStyle").click(function() {
    $(".roundedStyle").each(function() {
        $(this).removeClass("styleSelected")
    }), $(this).addClass("styleSelected"), registerStyle = $(this).children("img").attr("alt")
}), $("#doRegister").click(function() {
    var a = $("#reg-email").val(),
        b = $("#reg-password").val(),
        c = $("#rep-password").val(),
        d = $("#bth-day").val(),
        e = $("#bth-month").val(),
        f = $("#bth-year").val(),
        g = $("#reg-username").val();
		z = $("#g-recaptcha-response").val();
    $.ajax({
        type: "POST",
        url: "/register/do",
        data: "reg-email=" + a + "&reg-password=" + b + "&rep-password=" + c + "&bth-day=" + d + "&bth-month=" + e + "&bth-year=" + f + "&reg-look=" + registerStyle + "&reg-username=" + g + "&g-recaptcha-response=" + z,
        success: function(a) {
            console.log(a);
            var b = jQuery.parseJSON(a);
            "false" == b.valid ? $(".alert").addClass("alert-danger").html(b.response).fadeIn("slow").delay(6e3).fadeOut("slow") : ($(".alert").hasClass("alert-danger") && $(".alert").removeClass("alert-danger") && $(".alert").removeClass("alert-controle"), $(".alert").addClass("alert-success").html(b.response).fadeIn("slow").delay(1e3).fadeOut("slow"), window.setTimeout(function() {
                window.location.href = "/hotel"
            }, 1e3))
        }
    })
}), $("#goRegister").click(function() {
	$("#goRegister").each(function() {
		//
	}), $("#loginUnit").hide(), $("#ForgotUnit").hide(), $("#RegisterUnit").fadeIn("slow")
}), $("#goBack").click(function() {
	$("#goBack").each(function() {
	}), $("#RegisterUnit").hide(), $("#loginUnit").fadeIn("slow")
}), $("#goBack1").click(function() {
	$("#goBack1").each(function() {
	}), $("#ForgotUnit").hide(), $("#loginUnit").fadeIn("slow")
}), $("#goForgot").click(function() {
	$("#goForgot").each(function() {
		//
	}), $("#loginUnit").hide(), $("#ForgotUnit").fadeIn("slow")
}), 
	$("#InitLogin").click(function() {
    var a = $("#log-mail").val(),
        b = $("#log-password").val();
    0 == a.length || 0 == b.length ? $(".alert").addClass("alert-danger").html("<b>Oeps!</b> Vergeet niet alle velden in te vullen!").fadeIn("slow").delay(1e3).fadeOut("slow") : $.ajax({
        type: "POST",
        url: "login/do",
        data: "log-mail=" + a + "&log-password=" + b,
        success: function(a) {
            console.log(a);
            var b = jQuery.parseJSON(a);
            "false" == b.valid ? $(".alert").addClass("alert-danger").html(b.response).fadeIn("slow").delay(3e3).fadeOut("slow") : ($(".alert").hasClass("alert-danger") && $(".alert").removeClass("alert-danger") && $(".alert").removeClass("alert-controle"), $(".alert").addClass("alert-success").html(b.response).fadeIn("slow").delay(1e3).fadeOut("slow"), window.setTimeout(function() {
                window.location.href = "/me"
            }, 1e3))
        }
    })
}), $("#InitForgot").click(function() {
    var a = $("#forgot-mail").val();
    $(".alert").addClass("alert-controle").html("We controleren de gegevens. Een ogenblik geduld alstublieft\u2026").fadeIn("slow"), 0 == a.length ? $(".alert").addClass("alert-danger").html("<b>Oeps!</b> Vergeet niet alle velden in te vullen!").fadeIn("slow").delay(1e3).fadeOut("slow") : $.ajax({
        type: "POST",
        url: "public/PHPmailer/index.php",
        data: "mail=" + a,
        success: function(a) {
            console.log(a);
            var b = a;
            $(".alert").addClass("alert-controle").html("We controleren de gegevens. Een ogenblik geduld alstublieft\u2026").fadeIn("slow"), "false" == b.valid ? ($(".alert").hasClass("alert-danger") && $(".alert").removeClass("alert-danger"), $(".alert").addClass("alert-danger").html(b.response).fadeIn("slow").delay(1e3).fadeOut("slow")) : ($(".alert").hasClass("alert-danger") && $(".alert").removeClass("alert-danger"), $(".alert").hasClass("alert-danger") && $(".alert").removeClass("alert-danger"), $(".alert").addClass("alert-success").html(b.response).fadeIn("slow"), function() {
                $(this);
                $("#InitForgot").html("Je kunt over 10 seconden weer een mail sturen!").delay(1e3).prop("disabled", !0), $("#InitForgot").hasClass("customGreenButton") && ($("#InitForgot").removeClass("customGreenButton"), $("#InitForgot").addClass("customRedButton")), setTimeout(function() {
                    $("#InitForgot").html("Stuur opnieuw een mail!").delay(1e3).prop("disabled", !1), $("#InitForgot").hasClass("customRedButton") && ($("#InitForgot").removeClass("customRedButton"), $("#InitForgot").addClass("customGreenButton"))
                }, 9e3)
            }())
        }
    })
});

});