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


function LogoutMe() {
    swal({
            title: "Are you sure?",
            text: "Upon confirming the logout, you will be redirected to the sign-in page, prompting you to log in again.",
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

function SupremeVIPForm() {
var hh = "<br><br><form method=\"post\"><input type=\"hidden\" id=\"input\" name=\"buysupremevip\" size=\"32\" maxlength=\"32\"><button type=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Supreme VIP Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}
function PradaVIPForm() {
var hh = "<br><br><form method=\"post\"><input type=\"hidden\" id=\"input\" name=\"buypradavip\" size=\"32\" maxlength=\"32\"><button type=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Prada VIP Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}
function FendiVIPForm() {
var hh = "<br><br><form method=\"post\"><input type=\"hidden\" id=\"input\" name=\"buyfendivip\" size=\"32\" maxlength=\"32\"><button type=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Fendi VIP Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}
function GoatVIPForm() {
var hh = "<br><br><form method=\"post\"><input type=\"hidden\" id=\"input\" name=\"buygoatvip\" size=\"32\" maxlength=\"32\"><button type=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Goat VIP Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}
function SupremeVIPPerks() {
swal({
    //title: "Supreme VIP (&pound;3.75 | 25% OFF!)<br><br>", 
    title: "Supreme VIP (&pound;5.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<div class=\"btn-group-vertical88 btn-block\" role=\"group\"><center> Scroll down to view commands and extra features!</center><br><a type=\"submit\" name=\"payment_method\" value=\"1\" class=\"btn btn-default\" style=\"width: 380px;height: 282px;\"><b>Supreme VIP Catalog</b><br><center><p id=\"emblemas\" style=\"background-image: url('https://i.gyazo.com/20adf1bbb863cd1dac7fb61fbf2e0a37.png');float: left;left: -6px;width: 379px;height: 254px;background-size: cover;\"></p></center></a></div><p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><center><br>- Given 35k Credits in-game<br>- Given 45k Duckets in-game<br>- Given 80 Diamonds in-game<br>- Given VIP Badge in-game<br>- Given Your Own Avatar Face Badge in-game<br>- :fartface %username% Fart at another players face<br>:jerkoff - Beat your meat up!, FUCK YES!<br>:lovekiss %username% - Kiss another players<br>:slap %username% - Slap another players<br>- Fastwalk command (:fastwalk)<br>- Disable Mimic Command Protection<br>- Super pull command (:spull)<br>- Super push command (:spush)<br>- No chat flooding time<br>- Ability to enter rooms when they're full<br>- Currency timer 350 credits per cycle every 15 mins<br>- Currency timer 450 duckets per cycle every 15 mins<br>- Currency timer 20 diamonds per cycle every 15 mins<br>- You will have 60 daily respect every 24 hours<br>- You will have 250 daily pet respect every 24 hours",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}
function PradaVIPPerks() {
swal({
    //title: "Prada VIP (&pound;7.50 | 25% OFF!)<br><br>"    
    title: "Prada VIP (&pound;10.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<div class=\"btn-group-vertical88 btn-block\" role=\"group\"><center> Scroll down to view commands and extra features!</center><br><a type=\"submit\" name=\"payment_method\" value=\"1\" class=\"btn btn-default\" style=\"width: 380px;height: 280px;\"><b>Prada VIP Catalog</b><br><center><p id=\"emblemas\" style=\"background-image: url('https://i.gyazo.com/bed2957a06934fbd907e68db690cc387.png');float: left;left: -6px;width: 382px;height: 250px;background-size: cover;\"></p></center></a></div><p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><center><b>Also Includes of Supreme VIP Commands & Catalog!</b><br>- Given 55k Credits in-game<br>- Given 65k Duckets in-game<br>- Given 120 Diamonds in-game<br>- Given 5 Points in-game<br>- Given VIP Badge in-game<br>- Given Your Own Avatar Face Badge in-game<br>- :fatrface %username% Fart at another players face<br>:jerkoff - Beat your meat up!, FUCK YES!<br>:lovekiss %username% - Kiss another players<br>:slap %username% - Slap another players<br>- Given Supreme VIP Catalog<br>- Fastwalk command (:fastwalk)<br>- Bank command for diamonds, (:bankbalance,bankdeposit,bankwithdraw)<br>- Disable Mimic Command Protection<br>- Super pull command (:spull)<br>- Super push command (:spush)<br>- No chat flooding time<br>- Ability to enter rooms when they're full<br>- Currency timer 450 credits per cycle every 15 mins<br>- Currency timer 550 duckets per cycle every 15 mins<br>- Currency timer 25 diamonds per cycle every 15 mins<br>- You will have 90 daily respect every 24 hours<br>- You will have 90 daily pet respect every 24 hours",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}
function FendiVIPPerks() {
swal({
    //title: "Fendi VIP (&pound;11.25 | 25% OFF!)<br><br>"
    title: "Fendi VIP (&pound;15.00)<br><br>",  
    html: true,
	type: 'info',
    text: "<div class=\"btn-group-vertical88 btn-block\" role=\"group\"><center> Scroll down to view commands and extra features!</center><br><a type=\"submit\" name=\"payment_method\" value=\"1\" class=\"btn btn-default\" style=\"width: 380px;height: 320px;\"><b>Fendi VIP Catalog</b><br><center><p id=\"emblemas\" style=\"background-image: url('https://i.gyazo.com/8cecd155e9880b87e571b0a19a4fb89c.png');float: left;left: -5px;width: 380px;height: 292px;background-size: cover;\"></p></center></a></div><p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><center><b>Also Includes of Supreme & Prada VIP Commands & Catalog!</b><br>- Given 85k Credits in-game<br>- Given 95k Duckets in-game<br>- Given 150 Diamonds in-game<br>- Given 10 Points in-game<br>- Given VIP Badge in-game<br>- Given Your Own Avatar Face Badge in-game<br>- :fartface %username% Fart at another players face<br>:jerkoff - Beat your meat up!, FUCK YES!<br>:lovekiss %username% - Kiss another players<br>:slap %username% - Slap another players<br>- Given Supreme & Prada VIP Catalogs<br>- Given Fastwalk Command (:fastwalk)<br>- Super pull command (:spull)<br>- Super push command (:spush)<br>- No chat flooding time<br>- Ability to enter rooms when they're full<br>- Currency timer 550 credits per cycle every 15 mins<br>- Currency timer 650 duckets per cycle every 15 mins<br>- Currency timer 30 diamonds per cycle every 15 mins<br>- You will have 120 daily respect every 24 hours<br>- You will have 120 daily pet respect every 24 hours",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}
function GoatVIPPerks() {
swal({
    //title: "Goat VIP (&pound;22.50 | 25% OFF!)<br><br>", 
    title: "Goat VIP (&pound;30.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<div class=\"btn-group-vertical88 btn-block\" role=\"group\"><center> Scroll down to view commands and extra features!</center><br><a type=\"submit\" name=\"payment_method\" value=\"1\" class=\"btn btn-default\" style=\"width: 380px;height: 382px;\"><b>Goat VIP Catalog</b><br><center><p id=\"emblemas\" style=\"background-image: url('https://i.gyazo.com/8a40829580e586ac0a9cba2982351a12.png');float: left;left: -5px;width: 380px;height: 355px;background-size: cover;\"></p></center></a></div><p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><center><b>Also Includes of Supreme, Prada, Fendi VIP Commands & Catalog!</b><br><br><b>- Given 10 Thrones in-game</b><br>- Given 135k Credits in-game<br>- Given 155k Duckets in-game<br>- Given 300 Diamonds in-game<br>- Given 25 Points in-game<br>- Given VIP Badge in-game<br>- Given Your Own Avatar Face Badge in-game<br>- :fartface %username% Fart at another players face<br>:jerkoff - Beat your meat up!, FUCK YES!<br>:lovekiss %username% - Kiss another players<br>:slap %username% - Slap another players<br>- Given Supreme, Prada, Fendi VIP Catalog<br>- Given Room Alert Command (:roomalert <message>) <br>- Given Fastwalk Command (:fastwalk)<br>- Super pull command (:spull)<br>- Super push command (:spush)<br>- No chat flooding time<br>- Ability to enter rooms when they're full<br>- Currency timer 950 credits per cycle every 15 mins<br>- Currency timer 1050 duckets per cycle every 15 mins<br>- Currency timer 40 diamonds per cycle every 15 mins<br>- You will have 250 daily respect every 24 hours<br- You will have 250 daily pet respect every 24 hours>",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}
function SupremeVIPFormGift() {
var hh = "<br><br><form method=\"post\"><input type=\"text\" id=\"input\" name=\"buysupremevipgift\" size=\"32\" maxlength=\"32\" placeholder=\"Username of user you wish to gift!\"><button type=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Supreme VIP Gift Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}
function PradaVIPFormGift() {
var hh = "<br><br><form method=\"post\"><input type=\"text\" id=\"input\" name=\"buypradavipgift\" size=\"32\" maxlength=\"32\" placeholder=\"Username of user you wish to gift!\"><button type=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Prada VIP Gift Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}
function FendiVIPFormGift() {
var hh = "<br><br><form method=\"post\"><input type=\"text\" id=\"input\" name=\"buyfendivipgift\" size=\"32\" maxlength=\"32\" placeholder=\"Username of user you wish to gift!\"><button type=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Fendi VIP Gift Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}
function GoatVIPFormGift() {
var hh = "<br><br><form method=\"post\"><input type=\"text\" id=\"input\" name=\"buygoatvipgift\" size=\"32\" maxlength=\"32\" placeholder=\"Username of user you wish to gift!\"><button type=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Goat VIP Gift Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}
function Level1Perks() {
swal({
    title: "Level 1 (&pound;5.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 1 Badge in-game<br>- Given 2 Red Thrones in-game<br>- Given 1 Festive Red Pillows in-game<br>- Given 1 Jade Dragons in-game<br>- Given 1 Doric Blue Pillars in-game<br>- Given 1 Purple Marquees in-game<br>- Given 1 Pink Smoke Machines in-game",
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}
function Level2Perks() {
swal({
    title: "Level 2 (&pound;10.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 2 Badge in-game<br>- Given 4 Red Thrones in-game<br>- Given 2 Blue One Way Gates in-game<br>- Given 2 Jade Laser Gates in-game<br>- Given 2 Black Smoke Machines in-game<br>- Given 2 Yellow Spaceship Doors in-game",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level3Perks() {
swal({
    title: "Level 3 (&pound;15.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 3 Badge in-game<br>- Given 6 Red Thrones in-game<br>- Given 4 Fucsia (HotPink) Ice Cream Makers in-game<br>- Given 4 Frost Dragons in-game<br>- Given 4 Jade Birdbaths in-game<br>- Given 4 Red Traffic Lights in-game",  

    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level4Perks() {
swal({
    title: "Level 4 (&pound;20.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 4 Badge in-game<br>- Given 8 Red Thrones in-game<br>- Given 6 Yellow Smoke Machines in-game<br>- Given 6 Purple Spaceship Doors in-game<br>- Given 6 Navy Giant Pillows in-game<br>- Given 6 Green Marquees in-game<br>- Given 6 Red Oriental Screens in-game",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level5Perks() {
swal({
    title: "Level 5 (&pound;25.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 5 Badge in-game<br>- Given 10 Red Thrones in-game<br>- Given 8 Yellow Amber Lamps in-game<br>- Given 8 Orange Powered Fans in-game<br>- Given 8 Choco Ice Cream Makers in-game<br>- Given 8 Sky Dragon Lamps in-game<br>- Given 8 Green Oriental Screens in-game",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level6Perks() {
swal({
    title: "Level 6 (&pound;30.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 6 Badge in-game<br>- Given 12 Red Thrones in-game<br>- Given 8 Red Amber Lamps in-game<br>- Given 8 Blue Birdbaths in-game<br>- Given 8 Bronze Dragon in-game<br>- Given 8 Violet Parasols in-game<br>- Given 8 Ocean Inflatable Chairs in-game",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level7Perks() {
swal({
    title: "Level 7 (&pound;35.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 7 Badge in-game<br>- Given 14 Red Thrones in-game<br>- Given 9 Red Inflatable Chairs in-game<br>- Given 9 Purple Traffic Lights in-game<br>- Given 9 Red Laser Doors in-game<br>- Given 9 Aqua Smoke Machines in-game<br>- Given 9 Yellow Powered Fans in-game",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level8Perks() {
swal({
    title: "Level 8 (&pound;40.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 8 Badge in-game<br>- Given 16 Red Thrones in-game<br>- Given 10 Purple Powered Fans in-game<br>- Given 10 Lime Sleeping Bags in-game<br>- Given 10 Purple Sleeping Bags in-game<br>- Given 10 Silver Dragon Lamps in-game<br>- Given 20 Mars Rugs in-game",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level9Perks() {
swal({
    title: "Level 9 (&pound;45.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 9 Badge in-game<br>- Given 18 Red Thrones in-game<br>- Given 15 Ochre Ice Cream Makers in-game<br>- Given 15 Brown Powered Fans in-game<br>- Given 15 Green Powered Fans in-game<br>- Given 15 Habbo Cola Machines in-game",  
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level10Perks() {
swal({
    title: "Level 10 (&pound;50.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 10 Badge in-game<br>- Given 20 Red Thrones in-game<br>- Given 20 Red Birdbaths in-game<br>- Given 20 Orange Parasols in-game<br>- Given 20 Fire Dragon Lamps in-game<br>- Given 20 Black Dragon Lamps in-game",
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level11Perks() {
swal({
    title: "Level 11 (&pound;55.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 11 Badge in-game<br>- 22 Red Thrones in-game<br>- 15 Forest Dragon Lamps in-game<br>- 25 Blueberry Slurpee Machines in-game<br>- 25 Doric Gold Pillars in-game<br>- 25 Blue Laser Portals in-game",
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level12Perks() {
swal({
    title: "Level 12 (&pound;60.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 12 Badge in-game<br>- 24 Red Thrones in-game<br>- 30 Majestic Marquees in-game<br>- 40 Snow Patches in-game<br>- 30 Habbowood Chairs in-game<br>- 30 Red Sleeping Bags in-game",
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level13Perks() {
swal({
    title: "Level 13 (&pound;65.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 13 Badge in-game<br>- 40 Red Thrones in-game<br>- 35 Easter Dino Eggs in-game<br>- 35 Blue Smoke Machines in-game<br>- 35 White Oriental Screens in-game<br>- 20 Golden Dragon Lamps in-game",
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level14Perks() {
swal({
    title: "Level 14 (&pound;70.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 14 Badge in-game<br>- 45 Red Thrones in-game<br>- 40 Pink Hippos in-game<br>- 40 Classic Traffic Lights in-game<br>- 40 Purple Laser Portals in-game<br>- 40 Black One-Way Gates in-game",
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function Level15Perks() {
swal({
    title: "Level 15 (&pound;75.00)<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Given Level 15 Badge in-game<br>- 50 Red Thrones in-game<br>- 50 DJ Turntables in-game<br>- 30 Orange Inflatable Chairs in-game<br>- 30 Pink Dragon Lamps in-game<br>- 20 Hologirls in-game<br>- 20 Hotel View Memorial in-game",
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function GIGANTIC() {
swal({
    title: "<b>Gigantic</b> Package (&pound;19.99) - <font color='#600000'>LIMITED</font><br><br>", 
    html: true,
	type: 'info',
    text: "<div class=\"btn-group-vertical88 btn-block\" role=\"group\"><a type=\"submit\" name=\"payment_method\" value=\"1\" class=\"btn btn-default\"><b>Gigantic Package</b><br><center><p id=\"emblemas\" style=\"background-image:url('/app/tpl/skins/ZabboME/assets/images/PNG/GIGANTIC.png?12'); float: left;\"></p><p id=\"emblemas\" style=\"background-image:url('/app/tpl/skins/ZabboME/assets/images/PNG/POSTER.png?12'); float: left;\"></p><p id=\"emblemas\" style=\"background-image:url('/app/tpl/skins/ZabboME/assets/images/PNG/USER_BADGE.gif?33'); float: left;\"></p></center></a></div><br><p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><br>- Big User Statue (<font color='red'>Up to 24 Hours</font>)<br>- User Badge (<font color='red'>Up to 24 Hours</font>)<br>- User Wall Poster (<font color='red'>Up to 24 Hours</font>)<br>- 5,000 Diamonds in-game (<font color='green'>INSTANT</font>)",
    confirmButtonText: "Go Back!", 
    allowOutsideClick: "true" 
});
}

function CreditsForm() {
var hh = "<br><br><form method=\"post\"><select id=\"credits\" name=\"credit_pack\"><option value=\"1\">45,000 Credits (&pound;4)</option><option value=\"2\">95,000 Credits (&pound;7)</option><option value=\"3\">135,000 Credits (&pound;10)</option></select><button type=\"submit\" name=\"credit_pack_submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Credits Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please choose how many you would like <b>from the dropdown below</b> and click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function DucketsForm() {
var hh = "<br><br><form method=\"post\"><select id=\"duckets\" name=\"ducket_pack\"><option value=\"1\">45,000 Duckets (&pound;4)</option><option value=\"2\">95,000 Duckets (&pound;7)</option><option value=\"3\">135,000 Duckets (&pound;10)</option></select><button type=\"submit\" name=\"ducket_pack_submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Duckets Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please choose how many you would like <b>from the dropdown below</b> and click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function DiamondsForm() {
var hh = "<br><br><form method=\"post\"><select id=\"diamonds\" name=\"diamond_pack\"><option value=\"1\">200 Diamonds (&pound;4)</option><option value=\"2\">450 Diamonds (&pound;7)</option><option value=\"3\">900 Diamonds (&pound;10)</option></select><button type=\"submit\" name=\"diamond_pack_submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Diamonds Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please choose how many you would like <b>from the dropdown below</b> and click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function PointsForm() {
var hh = "<br><br><form method=\"post\"><select id=\"points\" name=\"point_pack\"><option value=\"1\">5 Point (&pound;5)</option><option value=\"2\">10 Points (&pound;8)</option><option value=\"3\">15 Points (&pound;13)</option><option value=\"4\">35 Points (&pound;23)</option></select><button type=\"submit\" name=\"point_pack_submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Points Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please choose how many you would like <b>from the dropdown below</b> and click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function SilverVIP() {
var hh = "<br><br><form action=\"/pp/paypal.php\" method=\"post\"><label for='username' style='float: left;'>Zabbo Username</label><input id='username' type='text' name='username'  disabled=\"disabled\" placeholder='' data-parsley-required-message='Please enter your username!' required=\"\" data-parsley-id='5'><select id=\"buy\" name=\"amount\"><option value=\"1\">Silver VIP (£6.50)</option></select><button type=\"submit\" name=\"submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Silver VIP Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please choose how many you would like <b>from the dropdown below</b> and click Buy Now!<br> If not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function NatureForm() {
var hh = "<br><br><form action=\"/pp/paypal.php\" method=\"post\"><select id=\"nature\" name=\"nature_chest\"><option value=\"1\">1 Chest (Â£3)</option><option value=\"2\">3 Chests (Â£9)</option><option value=\"3\">5 Chests (Â£15)</option><option value=\"4\">10 Chests (Â£25)</option><option value=\"5\">15 Chests (Â£35)</option><option value=\"6\">35 Chests (Â£50)</option></select><button type=\"submit\" name=\"nature_chest_submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Nature Chest Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please choose how many you would like <b>from the dropdown below</b> and click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function NaturePerks() {
swal({
    title: "Nature Chest Items<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><center><b>Levels</b><br>- 40% Chance for Level 1<br>- 30% Chance for Level 2<br>- 15% Chance for Level 3<br>- 10% Chance for Level 4<br>- 5% Chance for Level 5<br><br><img style='height:85%;width:85%' src='http://hxbbo.net/naturechest1.png'></center>",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function RoyalForm() {
var hh = "<br><br><form method=\"post\"><select id=\"royal\" name=\"royal_chest\"><option value=\"1\">1 Box (Â£3)</option><option value=\"2\">3 Boxes (Â£9)</option><option value=\"3\">5 Boxes (Â£15)</option><option value=\"4\">10 Boxes (Â£25)</option><option value=\"5\">15 Boxes (Â£35)</option><option value=\"6\">35 Boxes (Â£50)</option></select><button type=\"submit\" name=\"royal_chest_submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Royal Box Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please choose how many you would like <b>from the dropdown below</b> and click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function RoyalPerks() {
swal({
    title: "Royal Box Items<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><center><b>Levels</b><br>- 40% Chance for Level 1<br>- 30% Chance for Level 2<br>- 15% Chance for Level 3<br>- 10% Chance for Level 4<br>- 5% Chance for Level 5<br><br><img style='height:85%;width:85%' src='http://hxbbo.net/royalboxnew.png'></center>",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function IsolationForm() {
var hh = "<br><br><form method=\"post\"><select id=\"isolation\" name=\"isolation_pack\"><option value=\"1\">1 Isolation Pack (Â£10)</option></select><button type=\"submit\" name=\"isolation_pack_submit\" class=\"btn btn-primary btn-block\">Buy Now</button></form>";
swal({
    title: "Isolation Package Confirmation", 
    html: true,
	type: 'info',
    text: "This acts as a confirmation window to ensure you really want to go through with your purchase.<br>If you wish to finalize this purchase then please choose how many you would like <b>from the dropdown below</b> and click Buy Now, if not, please click the exit button below! " + hh + "",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
});
}

function IsolationPerks() {
swal({
    title: "Isolation Package Items<br><br>", 
    html: true,
	type: 'info',
    text: "<p style=\"text-align: left; margin-top: -10px; padding: 0.42%;\"><center><b>Items</b><br>- 3 Rare Crackable Eggs<br>- 1 Epic Crackable Egg<br>- 1 Royal Crackable Egg<br>- (NEW) 1 Legendary Crackable Egg<br>- 1 Royal Box<br>- 1 Nature Chest<br>- 1 Green Moodi Machine<br>- 1 Isolation Crown<br><br><img style='height:85%;width:85%' src='http://hxbbo.net/isolationpack.png'></center>",  
    confirmButtonText: "Exit!", 
    allowOutsideClick: "true" 
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


function popup(width, height, url) {
    var width = width;
    var height = height;
    var url = url;
    $("body").append('<div id="popup"></div>');
    $("#popup").append('<div id="makeblack"></div>');
    $("#popup").append('<div id="alert" style="width: ' + width + 'px;height: ' + height + 'px;"></div>');
    $("#popup #alert").load(url);
}

function previewTS(el)
{
	document.getElementById('ts-preview').innerHTML = '<img src="/ase/ts/' + el + '" />';
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

function HabboBlocked() {
    $("#column.footer .big").load("/HabboAvatarAPIBlocked");
}