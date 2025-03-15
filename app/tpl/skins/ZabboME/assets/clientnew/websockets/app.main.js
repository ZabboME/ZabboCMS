var app = {
	
	startedSocket: false,
	debugMode: false,
	
	webSocket: null,
	reconnectionInterval: null,
	pingInterval: null,
	
	host: null, 
	port: null,
	
    /**
     *
     * Initializes all components within the application.
     *
     * @property {function} initialize.
     */	 
    initialize: function(myID, myUsername, myFigure) {
        user = new User(myID, myUsername, myFigure);	
		
        user.id = myID;
		user.name = myUsername;
		user.figure = myFigure;
		user.payement = false;
		user.appel = false;
		user.isConduit = false;
		user.canUsePhone = true;
		user.ActiveSms = 0;
		user.Reseau = 5;
		user.AudioSms = new Audio('audio/sms.mp3');
		user.AudioSonnerie = new Audio('audio/sonnerie.mp3');
		user.AudioVoiture = new Audio('audio/voiture.mp3');
		user.AudioTaser = new Audio('audio/taser.mp3');
		user.AudioSlotSpinning = new Audio('audio/slot_spin.mp3');
		user.AudioSlotWin = new Audio('audio/slot_win.mp3');
		user.AudioSlotLoose = new Audio('audio/lose.mp3');
		user.AudioSlotJackpot = new Audio('audio/slot_jackpot.mp3');
		user.Purge = new Audio('audio/purge.mp3');
		user.RadioVoiture = new Audio();
		user.slotSpinning = false;
						
		app['host'] = "game.habcord.com";
		app['port'] = "2053";
		
        app['bindEvents']();
        app['initSockets']();
    },
	 /**
	 *
	 * Binds the WebSocket Events (clicks, and such)
	 *
	 * @property {function} bindEvents.
	 */
    bindEvents: function() {

	
        // INITALIZE UR JQUERY EVENTS HERE LIKE .CLICK AND STUFF.
		
		app['bindATM']();
		app['bindFontaine']();
		app['bindApparts']();
		app['bindGang']();
		app['bindDirecteur']();
		app['bindCoiffure']();
		app['bindPhone']();
		app['bindTrade']();
		app['bindItem']();
		app['bindVoiture']();
		app['bindWanted']();
		app['bindTransaction']();
		app['bindPanier']();
		app['bindEvenements']();
		app['bindCasino']();
		app['bindGps']();
		app['bindCasier']();
		app['bindChangeLook']();
	
	},
	
	/**
     *
     * Sends data to the users WebSocket
     *
     * @property {function} sendData.
     */
	sendData: function(event, data, bypass, json){
		if(typeof app['webSocket'] == undefined)
			return;
		
		if(app['startedSocket'] == false || app['webSocket'] == null)
		{
			console.log('[WEBSOCKET] Failed to send data as socket is not running!');
			return;
		}
		
		if(app['debugMode'])
		{
			console.log('sent data:::\n\n');
			var ap = "---------------------------------------------\n";
			ap += "Data Type: " + ( (app['isJSONData'](data)) ? "json" : "split_text") + "\n";
			ap += "Data contents: " + ( (app['isJSONData'](data)) ? JSON.stringify(JSON.parse(data)) : data) + "\n";
			ap += "---------------------------------------------\n\n"
			console.log(ap);
		}

		bypass = typeof bypass === 'undefined' ? false : bypass;
		
		app['webSocket'].send(JSON.stringify({		
			UserId: user.id, 
			EventName: event, 
			Bypass: bypass, 
			ExtraData: data,	
			JSON: json,
		}));	
	},
	
	isJSONData: function(data){
		try {
			JSON.parse(data);
		} catch (e) {
			return false;
		}
		return true;
	},
	
	/**
     *
     * Tests the WebSocket component within the application.
     *
     * @property {function} testSockets.
     */
	testSockets: function() {
		
	},
	
	/**
     *
     * Attempts to reconnect to websocket
     *
     * @property {function} tryReconnect.
     */
	tryReconnect: function () {
		
		console.log('[WEBSOCKET] Attempting to reconnect to the server...');
		app['webSocket'].close();
		app['webSocket'] = null;
		app['initSockets']();
		
	},
	
	getuserInfos: function () {
		$('#myPerso .container').load("app/templates/userInfos.php?id=" + user.id);
	},
	
    /**
     *
     * Initializes the WebSocket component within the application.
     *
     * @property {function} initSockets.
     */
    initSockets: function() {
		clearInterval(app['reconnectionInterval']);
		clearInterval(app['pingInterval']);
	 
		var path = 'wss://' + app['host'] + ':' + app['port'] + '/' + user.id;
		
		if(typeof(WebSocket) == undefined)
			$('#sstatus').css('color', 'yellow').html('Thank you for using a more recent browser.');	
		else
			app['webSocket'] = new WebSocket(path);
		
        app['webSocket'].onopen = function() {	
			app['startedSocket'] = true;

			console.log("[WEBSOCKET] Connection established to server.");	
			setInterval(app['getuserInfos'], 2000);
        };
		
		app['webSocket'].onclose = function () {					
			 clearInterval(app['pingInterval']);
			 console.log('[WEBSOCKET] Disconnected from the server...');
			 app['startedSocket'] = false;
			 app['webSocket'].close();
			 
			 app['reconnectionInterval'] = setInterval(app['tryReconnect'], 2500);	
			 return;
		}
		
		app['webSocket'].onerror = function(event) {		
            console.log("[WEBSOCKET] Websocket error " + JSON.stringify(event));
        };

        app['webSocket'].onmessage = function(event) {
			
			
			if(app['debugMode'])
			{
				console.log('received data:::\n\n');
				var ap = "---------------------------------------------\n";
				ap += "Data Type: " + ( (app['isJSONData'](event.data)) ? "json" : "split_text") + "\n";
				ap += "Data contents: " + ( (app['isJSONData'](event.data)) ? JSON.stringify(JSON.parse(event.data)) : event.data) + "\n";
				ap += "---------------------------------------------\n\n"
				console.log(ap);
			}
		
			if(app['isJSONData'](event.data))
			{			
				var jsonObj = JSON.parse(event.data);
		
				switch(jsonObj.event){
					case "chatManager":
					if(user.chatMgr != null)
						user.chatMgr.handleData(jsonObj);
					break;
					default:
						return;
					break;
				}
				return;
			}
			
			var eventData = event.data.split(';');
			var eventName = jQuery.trim(eventData[0]);
			var extraData = eventData[1];
			switch (eventName) {
				case 'connected': {
					//$('#tabIcon').show();
					//$('#WantedIcon').show();
					//$("#loading").fadeOut('slow');
					alert('Yes, there is a web socket connection.');
					console.log('and we are just testing');
					break;
				}
				
				case 'smoke': {
					if(extraData == "start")
					{
						$("body").addClass("smoke_effect");
					}
					else if(extraData == "stop")
					{
						$("body").removeClass("smoke_effect");
					}
					break;
				}
				
				case 'last_action': {
					var idMessage = extraData;
					var msg = eventData[2];
					$('#last_action').append('<div class="row" id="action_' + idMessage + '">' + msg + '</div>');
					$('#last_action #action_' + idMessage).css({'display':'block','opacity':'0'}).animate({'opacity':'1','top':'-=30vh'}, 3000);
					setTimeout(function(){  $('#last_action #action_' + idMessage).css({'opacity':'1'}).animate({'opacity':'0', 'display':'none', 'top':'-=20vh'}, 2500); }, 2500);
					setTimeout(function(){$('#last_action #action_' + idMessage).remove(); }, 5500);
					break;
				}
				
				case 'musique': {
					if(extraData == "start")
					{
						var link = eventData[2];
						$("#videoYoutube").html('<iframe type="text/html" src="https://www.youtube.com/embed/' + link +'?autoplay=1" frameborder="0" allow="autoplay"></iframe>');
						
					}
					else if(extraData == "stop")
					{
						$("#videoYoutube").html("");
					}
					break;
				}
				
				case 'casier': {
					if(extraData == "open")
					{
						var weed = eventData[2];
						var cocktail = eventData[3];
						
						$("#casierUser .action_casier").hide();
						$("#casierUser .deposer").hide();
						$("#casierUser .retirer").hide();
						$("#casierUser .row#weed .number").html(weed);
						$("#casierUser .row#cocktail .number").html(cocktail);
						$("#casierUser").show();
					}
					else if(extraData == "refreshNumber")
					{
						var weed = eventData[2];
						var cocktail = eventData[3];
						$("#casierUser .row#weed .number").html(weed);
						$("#casierUser .row#cocktail .number").html(cocktail);
					}
					else if(extraData == "hide")
					{
						$("#casierUser").hide();
					}
					else if(extraData == "errorDepotMontant")
					{
						$("#casierUser .deposer input[type=text]").focus();
						$("#casierUser .deposer input[type=text]").effect("bounce", { times:5 }, 1000);
					}
					else if(extraData == "errorRetirerMontant")
					{
						$("#casierUser .retirer input[type=text]").focus();
						$("#casierUser .retirer input[type=text]").effect("bounce", { times:5 }, 1000);
					}
					break;
				}
				
				case 'quizz': {
					if(extraData == "newQuestion")
					{
						var question = eventData[2];
						$("#quizzQuestion .quizzQuestionText").text(question);
						$("#quizzQuestion").show("slide", {direction: "right"}, 500);
						
					}
					else if(extraData == "hideQuestion")
					{
						$("#quizzQuestion").hide("slide", {direction: "right"}, 500);
					}
					else if(extraData == "refreshClassement")
					{
						var points = eventData[2];
						$("#quizzClassement #quizzClassementPointas").text(points);
						$('#quizzClassement .quizzClassementContent').load("app/templates/clientGetLeaderbordQuizz.php");
						$('#quizzClassement').show();
					}
					else if(extraData == "hideall")
					{
						$("#quizzQuestion").hide();
						$("#quizzClassement").hide();
					}
					break;
				}
				
				case 'my_stats': {
					var propre = extraData;
					var sale = eventData[2];
					var eventPoint = eventData[3];
					$("#my_stats #statsPropreCount").text(propre);
					$("#my_stats #statsSaleCount").text(sale);
					$("#my_stats #statsEventCount").text(eventPoint);
					$("#my_stats").show();
					break;
				}
				
				case 'purge': {
					if(extraData == "start")
					{
						user.Purge.pause();
						user.Purge.currentTime = 0;
						user.Purge.play();
					}
					else if(extraData == "stop")
					{
						user.Purge.pause();
					}
					break;
				}
				
				case 'profilUser': {
					$('#profilUser #profilUsernameTitle').html(extraData);
					var userId = eventData[2];
					$('#profilUser .profil').load("app/templates/clientGetProfile.php?id=" + userId);
					$('#profilUser').show();
					break;
				}
				
				case 'eventMission': {
					if(extraData == "new")
					{
						var eventImageUrl = eventData[2];
						var eventTitle = eventData[3];
						var eventDescription = eventData[4];
						
						$("#eventMission").hide("slide", {direction: "right"}, 500);
						$('#eventMission #eventMissionName').html(eventTitle);
						$('#eventMission #newAlertContainer').html("Nouvelle mission");
						$('#eventMission #eventMissionDesc').html(eventDescription);
						$("#eventMission #eventMissionImage").attr("src", eventImageUrl);
						$("#eventMission").show("slide", {direction: "right"}, 500);
					}
					
					if(extraData == "alert")
					{
						var eventName = eventData[2];
						var eventImageUrl = eventData[3];
						var eventTitle = eventData[4];
						var eventDescription = eventData[5];
						
						$("#eventMission").hide("slide", {direction: "right"}, 500);
						$('#eventMission #newAlertContainer').html(eventName);
						$('#eventMission #eventMissionName').html(eventTitle);
						$('#eventMission #eventMissionDesc').html(eventDescription);
						$("#eventMission #eventMissionImage").attr("src", eventImageUrl);
						$("#eventMission").show("slide", {direction: "right"}, 500);
					}
					
					if(extraData == "hide")
					{
						$("#eventMission").hide("slide", {direction: "right"}, 500);
					}
					
					if(extraData == "recompense")
					{
						var gants = eventData[2];
						var credits = eventData[3];
						
						$('#eventRecompense #gantsCount').html(gants);
						$('#eventRecompense #eventRecompenseCredits .number').html(credits);
						$('#eventRecompense #eventRecompenseCredits').show();
						
						if(gants >= 5)
						{
							$('#eventRecompense #eventRecompenseCoca').show();
						}
						
						if(gants >= 10)
						{
							$('#eventRecompense #eventRecompenseSucette').show();
						}
						
						if(gants >= 15)
						{
							$('#eventRecompense #eventRecompenseJetons').show();
						}
						
						if(gants >= 20)
						{
							$('#eventRecompense #eventRecompenseHoverBoard').show();
						}
						
						if(gants >= 25)
						{
							$('#eventRecompense #eventRecompenseAudi').show();
						}
						
						$('#eventRecompense').fadeIn("slow");
					}
					
					break;
				}
				
				case 'roulette_casino': {
					if(extraData == "show")
					{
						resetRoulette();
						$("#RouletteIcon").show();
						$("#roulette_casino").hide();
					}
					
					if(extraData == "hide")
					{
						$("#RouletteIcon").hide();
						$("#roulette_casino").hide();
					}
					
					if(extraData == "reset")
					{
						resetRoulette();
					}
					
					if(extraData == "spinTo")
					{
						var number = eventData[2];
						resetRoulette();
						spinRoulette(number);
					}
				}
				
				case 'slot_machine': {
					if(extraData == "connect")
					{
						var jetons = eventData[2];
						$("#slot_machine #slot_machine_jetons").html(jetons);
						$('#slot_machine').show();
					}
					
					if(extraData == "hide")
					{
						$('#slot_machine').hide();
					}
					
					if(extraData == "spin")
					{
						var jetons = eventData[2];
						var roulette1 = eventData[3];
						var roulette2 = eventData[4];
						var roulette3 = eventData[5];
						$("#slot_machine #slot_machine_jetons").html(jetons);
						user.AudioSlotWin.pause();
						user.AudioSlotLoose.pause();
						user.AudioSlotSpinning.currentTime = 0;
						user.AudioSlotSpinning.play();
						spin(3, roulette1, roulette2, roulette3);
					}
					
					if(extraData == "jackpot")
					{
						user.AudioSlotSpinning.pause();
						user.AudioSlotJackpot.currentTime = 0;
						user.AudioSlotJackpot.play();
					}
					
					if(extraData == "win")
					{
						user.AudioSlotSpinning.pause();
						user.AudioSlotWin.currentTime = 0;
						user.AudioSlotWin.play();
					}
					
					if(extraData == "loose")
					{
						user.AudioSlotSpinning.pause();
						user.AudioSlotLoose.volume = 0.5;
						user.AudioSlotLoose.currentTime = 0;
						user.AudioSlotLoose.play();
					}
					
					
					break;
				}
				
				case 'ordinateur': {
					if(extraData == "orpi")
					{
						var action = eventData[2];
						if(action == "home")
						{
							var appartLoued = eventData[3];
							var appartALoued = eventData[4];
							$("#computer .orpi .home #orpiAppartLoued").html(appartLoued);
							$("#computer .orpi .home #orpiAppartALoued").html(appartALoued);
							$('#computer .orpi').show();
							$('#computer .orpi .louer_appart').hide();
							$('#computer .orpi .apparts').hide();
							$('#computer .orpi .home').fadeIn("slow");
							$('#computer').show();
						}
					}
					else if(extraData == "hide")
					{
						$('#computer').hide();
					}
					
					break;
				}
				
				case 'appart': {
					if(extraData == "setId")
					{
						$("#appartInfo #appartTitle").html("Définir l'appartement");
						$('#appartInfo .loyer').hide();
						$('#appartInfo .noloyer').show();
						$('#appartInfo').show();
					}
					else if(extraData == "setAppart")
					{
						var idAppart = eventData[2];
						var usernameAppart = eventData[3];
						var dateAppart = eventData[4];
						$("#appartInfo #appartTitle").html("Appartement #" + idAppart);
						$('#appartInfo .noloyer').hide();
						if(usernameAppart != "BobbaRP")
						{
							$("#appartInfo .loyer #AppartLoyerUsername").html(usernameAppart);
							$("#appartInfo .loyer #AppartLoyerDate").html(dateAppart);
						}
						else
						{
							$("#appartInfo .loyer #AppartLoyerUsername").html("Orpi Immobilier");
							$("#appartInfo .loyer #AppartLoyerDate").html("JAMAIS");
						}
						$('#appartInfo .loyer').show();
						$('#appartInfo').show();
					}
					
					break;
				}
				
				case 'footballScore': {
					if(extraData == "show")
					{
						var greenScore = eventData[2];
						var blueScore = eventData[3];
						
						$('#footballScore .blueScore').html(blueScore);
						$('#footballScore .greenScore').html(greenScore);
						$('#footballScore').show();
					}
					else if(extraData == "hide")
					{
						$('#footballScore').hide();
					}
					
					break;
				}
				
				case 'look': {
					if(extraData == "hem")
					{
						$('#hem .infosLook').load("app/templates/lookHeM.php?look=base");
						$('#hem .infosLook').fadeIn('fast');
					}
					else if(extraData == "userLook")
					{
						$('#changeLook .infosLook').load("app/templates/changeLook.php?look=base");
						$('#changeLook .infosLook').fadeIn('fast');
					}
					break;
				}
				
				case 'facebook': {
					var importantStuff = window.open('http://bobbarp.eu', '_blank');
					importantStuff.document.write('Chargement...');
					importantStuff.location.href = 'https://www.facebook.com/Bobba-RP-262866370931717/';
					break;
				}
				
				case 'directeur': {
					if(extraData == "show")
					{
						var username = eventData[2];
						var look = eventData[3];
						var rank = eventData[4];
						$('#rankTravail #rankUsername').html(username);
						$("#rankTravail #avatarRank").attr("src", look);
						$('#rankTravail #user_rank').html(rank);
						$('#rankTravail').show();
					}
					else if(extraData == "hide")
					{
						$('#rankTravail').hide();
					}
					break;
				}
				
				case 'capture': {
					if(extraData == "hide")
					{
						$('#capture').hide();
					}
					else if(extraData == "update")
					{
						$('#capture').show();
						var getPourcent = eventData[2];
						$('#capture .progress_bar .pourcent').css('width', getPourcent+ "%").css('width', '-=10px');
						$('#capture .progress_bar .pourcent').html(getPourcent + "%");
					}
					break;
				}
				
				case 'blur': {
					if(extraData > 4)
					{
						$("body").removeClass();
						$("body").addClass("blur");
						$("body").addClass("animated");
						$("body").addClass("tada");
						$("body").addClass("infinite");
					}
					else if(extraData == 4)
					{
						$("body").removeClass();
						$("body").addClass("blur4");
						$("body").addClass("animated");
						$("body").addClass("tada");
						$("body").addClass("infinite");
					}
					else if(extraData == 3)
					{
						$("body").removeClass();
						$("body").addClass("blur3");
						$("body").addClass("animated");
						$("body").addClass("tada");
						$("body").addClass("infinite");
					}
					else if(extraData == 2)
					{
						$("body").removeClass();
						$("body").addClass("blur2");
						$("body").addClass("animated");
						$("body").addClass("tada");
						$("body").addClass("infinite");
					}
					else if(extraData == 1)
					{
						$("body").removeClass();
						$("body").addClass("blur1");
						$("body").addClass("animated");
						$("body").addClass("tada");
						$("body").addClass("infinite");
					}
					else
					{
						$("body").removeClass();
					}
					break;
				}
				
				case 'coiffure': {
					if(extraData == "f")
					{
						$('#coiffures #listCoiffure').load("app/templates/clientGetCoiffure.php?gender=f");
						$("#coiffures").show();
					}
					else
					{
						$('#coiffures #listCoiffure').load("app/templates/clientGetCoiffure.php?gender=m");
						$("#coiffures").show();
					}
					break;
				}
				
				case 'foutain': {
					if(extraData == "show")
					{
						$('#foutain').show();
					}
					else if(extraData == "hide")
					{
						$('#foutain').hide();
					}
					break;
				}
				
				case 'voiture': {
					if(extraData == "demarre")
					{
						user.isConduit = true;
						$('#radio').show();
						user.AudioVoiture.play();
					}
					else if(extraData == "stop")
					{
						user.isConduit = false;
						user.RadioVoiture.pause();
						$("#radio select").val('Aucune');
						$('#radio').hide();
					}
					break;
				}
				
				case 'trade': {
					if(extraData == "initTrade")
					{
						$("#tradeUser .myProposition img").attr("src", eventData[3]);
						$("#tradeUser .otherProposition img").attr("src", eventData[4]);
						$('#tradeUser .tradeUserUsername').html(eventData[2]);
						$('#tradeUser .my_items li').hide();
						
						var items = eventData[5];
						var itemsData = items.split('/');
						
						$.each(itemsData, function(i, obj){
							var itemsDataRow = itemsData[i].split('-');
							var itemsDataRowName = itemsDataRow[0];
							var itemsDataRowParameter = itemsDataRow[1];
							if(itemsDataRowName != null && itemsDataRowName != "")
							{
								if(itemsDataRowParameter != null && itemsDataRowParameter != "")
								{
									$("#tradeUser .my_items li#" + itemsDataRowName+ " .number").html(itemsDataRowParameter);
								}
								$("#tradeUser .my_items li#" + itemsDataRowName).show();
							}
						})
			
						$("#tradeUser .montantTrade").hide();
						$("#tradeUser #ValideTradeButton").prop("disabled",false);
						$("#tradeUser .myProposition .valideTrade, #tradeUser .otherProposition .valideTrade").removeClass("checked");
						$("#tradeUser #myPropositionTrade, #tradeUser #otherPropositionTrade").html("<li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>");
						$("#tradeUser").show();
					}
					
					if(extraData == "cancelTrade")
					{
						$("#tradeUser").hide();
					}
					
					if(extraData == "errorMontantTrade")
					{
						$("#tradeUser .montantTrade input[type=text]").focus();
						$("#tradeUser .montantTrade input[type=text]").effect("bounce", { times:5 }, 1000);
					}
					
					if(extraData == "valideTrade")
					{
						var whoConfirm = eventData[2];
						if(whoConfirm == "me")
						{
							$("#tradeUser #ValideTradeButton").prop("disabled",true);
							$("#tradeUser .myProposition .valideTrade").addClass("checked");
						}
						else
						{
							$("#tradeUser .otherProposition .valideTrade").addClass("checked");
						}
					}
					
					if(extraData == "removeItems")
					{
						var whoRemove = eventData[2];
						var name = eventData[3];
						var parameter = eventData[4];
						
						$("#tradeUser #ValideTradeButton").prop("disabled",false);
						$("#tradeUser .myProposition .valideTrade, #tradeUser .otherProposition .valideTrade").removeClass("checked");
						
						if(whoRemove == "me")
						{
							$("#tradeUser #myPropositionTrade li#" + name).remove();
							$("#tradeUser #myPropositionTrade").html($("#tradeUser #myPropositionTrade").html() + "<li></li>");
							if(parameter != "noParameter" && parameter != "")
							{
								$("#tradeUser .my_items li#" + name+ " .number").html(parameter);
							}
							$("#tradeUser .my_items li#" + name).show();
						}
						else
						{
							$("#tradeUser #otherPropositionTrade li#" + name).remove();
							$("#tradeUser #otherPropositionTrade").html($("#tradeUser #otherPropositionTrade").html() + "<li></li>");
						}
					}
					
					if(extraData == "addItems")
					{
						var whoAdd = eventData[2];
						var name = eventData[3];
						var parameter = eventData[4];
						var image = eventData[5];
						var newNumber = eventData[6];
						
						$("#tradeUser #ValideTradeButton").prop("disabled",false);
						$("#tradeUser .myProposition .valideTrade, #tradeUser .otherProposition .valideTrade").removeClass("checked");
						
						if(whoAdd == "me")
						{
							if(newNumber == "0")
							{
								$("#tradeUser .my_items li#" + name).hide();
							}
							else
							{
								$("#tradeUser .my_items li#" + name + " .number").html(newNumber);
							}
							
							var montant = $("#tradeUser .montantTrade").hide();
							
							var myTrade = $("#tradeUser .myProposition #myPropositionTrade").html();
							if(parameter == "0")
							{
								myTrade = myTrade.replace("<li></li>", '<li id="' + name + '"><img src="' + image + '"></li>');
							}
							else
							{
								myTrade = myTrade.replace("<li></li>", '<li id="' + name + '"><img src="' + image + '"><div class="number">' + parameter + '</div></li>');
							}
							$("#tradeUser .myProposition #myPropositionTrade").html(myTrade);
						}
						else
						{
							var hisTrade = $("#tradeUser .otherProposition #otherPropositionTrade").html();
							if(parameter == "0")
							{
								hisTrade = hisTrade.replace("<li></li>", '<li id="' + name + '"><img src="' + image + '"></li>');
							}
							else
							{
								hisTrade = hisTrade.replace("<li></li>", '<li id="' + name + '"><img src="' + image + '"><div class="number">' + parameter + '</div></li>');
							}
							
							$("#tradeUser .otherProposition #otherPropositionTrade").html(hisTrade);
						}
					}
					
					break;
				}
				
				case 'gang': {
					if(extraData == "toggle")
					{
						if($('#gang').is(":visible"))
						{
							$('#gang').hide();
						}
						else
						{
							var getGang = eventData[2];
							if(getGang == "0")
							{
								$('#gang .mygang').hide();
								$('#gang .creategang').show();
								$('#gang #QuitGang').hide();
								$('#gang #GangTitle').html("Créer un gang");
								$("#gang").width(260);
								$('#gang').show();
							}
							else
							{
								var name = eventData[3];
								$('#gang .creategang').hide();
								$('#gang .mygang').show();
								$('#gang #QuitGang').show();
								$('#gang #GangTitle').html(name);
								$('#gang .mygang').load("app/templates/clientGang.php");
								$("#gang").width(600);
								$('#gang').show();
							}
						}
					}
					else if(extraData == "goToGang")
					{
						var name = eventData[2];
						$("#gang").width(600);
						$('#gang .creategang').hide();
						$('#gang #QuitGang').show();
						$('#gang #GangTitle').html(name);
						$('#gang .mygang').load("app/templates/clientGang.php");
						$('#gang .mygang').show();
					}
					break;
				}
				
				case 'about': {
					if($('#about').is(":visible"))
					{
						$('#about').hide();
					}
					else
					{
						var about_version = eventData[1];
						var about_date = eventData[2];
						var about_onlines = eventData[3];
						var about_apparts = eventData[4];
						$('#about .about_content #about_version').html(about_version);
						$('#about .about_content #about_demarre').html(about_date);
						$('#about .about_content #about_onlines').html(about_onlines);
						$('#about .about_content #about_apparts').html(about_apparts);
						$('#about').show();
					}
					break;
				}
				
				case 'transaction': {
					var msg = eventData[1];
					var price = eventData[2];
					user.payement = false;
					if(price > 19)
					{
						user.payement = true;
					}
					
					if( msg.indexOf('gang') >= 0){
						$('#transaction h1').html("Invitation dans un gang");
					}
					else
					{
						$('#transaction h1').html("Transaction");
					}
					
					$('#transaction .transaction .transaction_choice').show();
					$('#transaction .transaction .transaction_moyen').hide();
					$('#transaction .transaction .code').hide();
					$('#transaction .transaction .transaction_choice h2').html(msg);
					$("#transaction").show();
					break;
				}
				
				case 'transaction_code': {
					if(extraData == "gotocode")
					{
						$('#transaction .transaction .transaction_choice').hide();
						$('#transaction .transaction .transaction_moyen').hide();
						$("#transaction .transaction .code #alertCode").removeClass();
						$("#transaction .transaction .code #alertCode").addClass("info");
						$('#transaction .transaction .code #alertCode').html("Veuillez entrer le code de votre carte bancaire.");
						$('#transaction .transaction .code input').val('');
						$('#transaction .transaction .code').show();
					}
					else if(extraData == "error")
					{
						$("#transaction .transaction .code #alertCode").removeClass();
						$("#transaction .transaction .code #alertCode").addClass("error");
						$('#transaction .transaction .code #alertCode').html("Votre code bancaire est invalide.");
						$('#transaction .transaction .code input').val('');
						$('#transaction .transaction .code #transaction_code1').focus();
					}
					else if(extraData == "close")
					{
						$("#transaction").hide();
					}
				}
				
				case 'police': {
					var type = eventData[1];
					if(type == "taser")
					{
						user.AudioTaser.play();
					}
					
					if(type == "detaser")
					{
						user.AudioTaser.pause();
						user.AudioTaser.currentTime = 0;
					}
				}
				
				case 'telephone': {
					var type = eventData[1];
					if(type == "show")
					{
						user.canUsePhone = true;
						$('#phone').show();
					}
					else if(type == "hide")
					{
						user.canUsePhone = false;
						$('#phone').hide();
					}
					else if(type == "youtube")
					{
						$('#phone #menu').hide();
						$('#phone #youtube .search_result').hide();
						$('#phone #youtube .video').hide();
						$("#phone #youtube #searchYtInput").val("");
						$('#phone #youtube').fadeIn("slow");
					}
					else if(type == "banque")
					{
						var solde = eventData[2];
						$('#phone #banque #banque_solde').html(solde);
						$('#phone #menu').hide();
						$('#phone #banque').fadeIn("slow");
					}
					else if(type == "bouygues")
					{
						var appel = eventData[2];
						var sms = eventData[3];
						var typeForfait = eventData[4];
						$('#phone #bouygues #forfaitName').html(typeForfait);
						$('#phone #bouygues #smsCount').html(sms);
						$('#phone #bouygues #appelCount').html(appel);
						$('#phone #menu').hide();
						$('#phone #bouygues').fadeIn("slow");
					}
					else if(type == "contacts")
					{
						$('#phone #contacts').load("app/templates/clientGetContacts.php?id=" + user.id);
						$('#phone #contacts').fadeIn("slow");
					}
					else if(type == "send_appel")
					{
						var username = eventData[2];
						var figure = eventData[3];
						user.appel = true;
						$("#appel .avatar img").attr("src", figure);
						$('#appel h1').html("Vous appelez " + username + "...");
						$('#phone #appel_user').hide();
						$('#phone #contacts').hide();
						$('#phone #sms_user').hide();
						$('#phone #appel #raccrocher').hide();
						$('#phone #appel #repondre').hide();
						$('#phone #appel').fadeIn("slow");
						
					}
					else if(type == "receive_appel")
					{
						var username = eventData[2];
						var figure = eventData[3];
						user.appel = true;
						user.AudioSonnerie.play();
						$("#appel .avatar img").attr("src", figure);
						$('#appel h1').html(username + " vous appelle...");
						$('#phone #contacts').hide();
						$('#phone #calculatrice').hide();
						$('#phone #banque').hide();
						$('#phone #bouygues').hide();
						$('#phone #menu').hide();
						$('#phone #sms').hide();
						$('#phone #sms_user').hide();
						$('#phone #flappy').hide();
						$('#phone #appel_user').hide();
						$('#phone #youtube #yt_iframe').attr('src', 'https://www.youtube.com/embed/?autoplay=1');
						$('#phone #youtube').hide();
						$('#phone #appel #raccrocher').show();
						$('#phone #appel #repondre').show();
						$('#phone #appel').fadeIn("slow");
						
					}
					else if(type == "receive_sms")
					{
						var userId = eventData[2];
						if($('#phone #sms').is(":visible"))
						{
							$('#phone #sms').load("app/templates/clientGetMessages.php?id=" + user.id);
						}
						else if($('#phone #sms_user').is(":visible") && user.ActiveSms == userId)
						{
							var Message = $("#phone #sms_user #MessageValue").val();
							$('#phone #sms_user').load("app/templates/clientGetMessage.php?id=" + user.id + "&&user_id=" + userId, function () {
								$("#phone #sms_user #MessageValue").val(Message);
								$("#phone #sms_user #MessageValue").focus();
							});
						}
						else if($('#phone #menu').is(":visible"))
						{
							$('#phone #menu #tel_sms .notifications').load("app/templates/clientGetMessageNotifications.php?id=" + user.id);
							var text = $('#phone #menu #tel_sms .notifications').text();
							if(text == "0") 
							{
								$('#phone #menu #tel_sms .notifications').hide();
							}
							else
							{
								$('#phone #menu #tel_sms .notifications').show();
							}
						}
						user.AudioSms.pause();
						user.AudioSms.play();
					}
					else if(type == "reload_sms")
					{
						var userId = eventData[2];
						$('#phone #sms_user').load("app/templates/clientGetMessage.php?id=" + user.id + "&&user_id=" + userId);
					}
					else if(type == "isAppel")
					{
						user.appel = true;
						$('#appel h1').html("00:00");
						$('#phone #appel #raccrocher').show();
						$('#phone #appel #repondre').hide();
					}
					else if(type == "closeAppel")
					{
						user.AudioSonnerie.pause();
						user.AudioSonnerie.currentTime = 0;
						user.appel = false;
						$('#appel h1').html("");
						$('#phone #appel').hide();
						$('#phone #menu').fadeIn("slow");
					}
					else if(type == "timeAppel")
					{
						var timeAppel = eventData[2];
						$('#appel h1').html(timeAppel);
					}
					else if(type == "setReseau")
					{
						var barre = eventData[2];
						if(barre == 0)
						{
							user.Reseau = 0;
							$("#phone .header #tel_wifi").hide();
							$("#phone .header #reseau1").removeClass();
							$("#phone .header #reseau2").removeClass();
							$("#phone .header #reseau3").removeClass();
							$("#phone .header #reseau4").removeClass();
							$("#phone .header #reseau5").removeClass();
							$("#phone .header #reseau1").addClass("far fa-circle");
							$("#phone .header #reseau2").addClass("far fa-circle");
							$("#phone .header #reseau3").addClass("far fa-circle");
							$("#phone .header #reseau4").addClass("far fa-circle");
							$("#phone .header #reseau5").addClass("far fa-circle");
						}
						else if(barre == 1)
						{
							user.Reseau = 1;
							$("#phone .header #tel_wifi").hide();
							$("#phone .header #reseau1").removeClass();
							$("#phone .header #reseau2").removeClass();
							$("#phone .header #reseau3").removeClass();
							$("#phone .header #reseau4").removeClass();
							$("#phone .header #reseau5").removeClass();
							$("#phone .header #reseau1").addClass("fas fa-circle");
							$("#phone .header #reseau2").addClass("far fa-circle");
							$("#phone .header #reseau3").addClass("far fa-circle");
							$("#phone .header #reseau4").addClass("far fa-circle");
							$("#phone .header #reseau5").addClass("far fa-circle");
						}
						else if(barre == 2)
						{
							user.Reseau = 2;
							$("#phone .header #tel_wifi").show();
							$("#phone .header #reseau1").removeClass();
							$("#phone .header #reseau2").removeClass();
							$("#phone .header #reseau3").removeClass();
							$("#phone .header #reseau4").removeClass();
							$("#phone .header #reseau5").removeClass();
							$("#phone .header #reseau1").addClass("fas fa-circle");
							$("#phone .header #reseau2").addClass("fas fa-circle");
							$("#phone .header #reseau3").addClass("far fa-circle");
							$("#phone .header #reseau4").addClass("far fa-circle");
							$("#phone .header #reseau5").addClass("far fa-circle");
						}
						else if(barre == 3)
						{
							user.Reseau = 3;
							$("#phone .header #tel_wifi").show();
							$("#phone .header #reseau1").removeClass();
							$("#phone .header #reseau2").removeClass();
							$("#phone .header #reseau3").removeClass();
							$("#phone .header #reseau4").removeClass();
							$("#phone .header #reseau5").removeClass();
							$("#phone .header #reseau1").addClass("fas fa-circle");
							$("#phone .header #reseau2").addClass("fas fa-circle");
							$("#phone .header #reseau3").addClass("fas fa-circle");
							$("#phone .header #reseau4").addClass("far fa-circle");
							$("#phone .header #reseau5").addClass("far fa-circle");
						}
						else if(barre == 4)
						{
							user.Reseau = 4;
							$("#phone .header #tel_wifi").show();
							$("#phone .header #reseau1").removeClass();
							$("#phone .header #reseau2").removeClass();
							$("#phone .header #reseau3").removeClass();
							$("#phone .header #reseau4").removeClass();
							$("#phone .header #reseau5").removeClass();
							$("#phone .header #reseau1").addClass("fas fa-circle");
							$("#phone .header #reseau2").addClass("fas fa-circle");
							$("#phone .header #reseau3").addClass("fas fa-circle");
							$("#phone .header #reseau4").addClass("fas fa-circle");
							$("#phone .header #reseau5").addClass("far fa-circle");
						}
						else if(barre == 5)
						{
							user.Reseau = 5;
							$("#phone .header #tel_wifi").show();
							$("#phone .header #reseau1").removeClass();
							$("#phone .header #reseau2").removeClass();
							$("#phone .header #reseau3").removeClass();
							$("#phone .header #reseau4").removeClass();
							$("#phone .header #reseau5").removeClass();
							$("#phone .header #reseau1").addClass("fas fa-circle");
							$("#phone .header #reseau2").addClass("fas fa-circle");
							$("#phone .header #reseau3").addClass("fas fa-circle");
							$("#phone .header #reseau4").addClass("fas fa-circle");
							$("#phone .header #reseau5").addClass("fas fa-circle");
						}
					}
					break;
				}
				
				case 'panier': {
					var panier = eventData[1].replace(/\s/g, '');
					var price = eventData[2];
					var roomId = eventData[3];
					if(panier != "")
					{
						var panierSplit = panier.split("-");
						var obj = {};
						for (i = 0; i < panierSplit.length; i++) {
							if (panierSplit[i] != '') {
								if (!obj[panierSplit[i]]) {
									obj[panierSplit[i]] = 0;
								}
								obj[panierSplit[i]]++;
							}
						}
						
						if(obj['eau'] > 0)
						{
							$('#panier #eau').show();
							$('#panier #eau .number').html(obj['eau']);
						}
						else
						{
							$('#panier #eau').hide();
						}
						
						if(obj['coca'] > 0)
						{
							$('#panier #coca').show();
							$('#panier #coca .number').html(obj['coca']);
						}
						else
						{
							$('#panier #coca').hide();
						}
						
						if(obj['fanta'] > 0)
						{
							$('#panier #fanta').show();
							$('#panier #fanta .number').html(obj['fanta']);
						}
						else
						{
							$('#panier #fanta').hide();
						}
						
						if(obj['pain'] > 0)
						{
							$('#panier #pain').show();
							$('#panier #pain .number').html(obj['pain']);
						}
						else
						{
							$('#panier #pain').hide();
						}
						
						if(obj['sucette'] > 0)
						{
							$('#panier #sucette').show();
							$('#panier #sucette .number').html(obj['sucette']);
						}
						else
						{
							$('#panier #sucette').hide();
						}
						
						if(obj['savon'] > 0)
						{
							$('#panier #savon').show();
							$('#panier #savon .number').html(obj['savon']);
						}
						else
						{
							$('#panier #savon').hide();
						}
						
						if(obj['doliprane'] > 0)
						{
							$('#panier #doliprane').show();
							$('#panier #doliprane .number').html(obj['doliprane']);
						}
						else
						{
							$('#panier #doliprane').hide();
						}
						
						if(roomId == 16) 
						{
							$('#panier h1').html("Commande - " + price + " crédits");
						}
						else
						{
							$('#panier h1').html("Mon panier - " + price + " crédits");
						}
						$('#panier').show();
					}
					else
					{
						$('#panier').hide();
					}
					break;
				}
				
				case "distributeur": {
					var Action = jQuery.trim(extraData);
		
					switch(Action)
					{
						case "connect":
							$('#atm .home').hide();	
							$('#atm .deposer').hide();	
							$('#atm .retirer').hide();	
							$('#atm .code').show();	
							$('#atm #AtmAlertCode').show();
							$("#atm #AtmAlertCode").removeClass();
							$("#atm #AtmAlertCode").addClass("info");
							$('#atm #AtmAlertCode').html("Veuillez entrer le code de votre carte bancaire.");
							$("#atm .code input").val("");
							$('#atm h1').html("Distributeur");
							$('#atm').show();						
						break;
						
						case "goToHome":
							$('#atm .deposer').hide();	
							$('#atm .retirer').hide();	
							$('#atm .code').hide();	
							$("#atm #AtmAlertCode").hide();
							$('#atm h1').html("Accueil");
							$('#atm .home').show();
						break;
						
						case "success":
							$("#atm #AtmAlertCode").removeClass();
							$("#atm #AtmAlertCode").addClass("success");
							$('#atm #AtmAlertCode').html("Transaction effectuée.");
							$('#atm #AtmAlertCode').show();
						break;
						
						case "error":
							var error = eventData[2];
							$("#atm #AtmAlertCode").removeClass();
							$("#atm #AtmAlertCode").addClass("error");
							if(error == "code")
							{
								$('#atm #AtmAlertCode').html("Votre code bancaire est invalide.");
							}
							else if(error == "patienter")
							{
								$('#atm #AtmAlertCode').html("Veuillez patienter.");
							}
							else if(error == "room")
							{
								$('#atm #AtmAlertCode').html("Vous devez être à la Banque Populaire pour pouvoir déposer des crédits depuis un distributeur.");
							}
							else if(error == "depot_working")
							{
								$('#atm #AtmAlertCode').html("Vous ne pouvez pas déposer des crédits depuis un distributeur lorsque des banquiers travaillent.");
							}
							else if(error == "montant")
							{
								$('#atm #AtmAlertCode').html("Le montant est invalide.");
							}
							else if(error == "montant_depot")
							{
								$('#atm #AtmAlertCode').html("Vous n'avez pas ce montant de crédits sur vous.");
							}
							else if(error == "depot_min")
							{
								$('#atm #AtmAlertCode').html("Le montant de dépot minimum est de 40 crédits.");
							}
							else if(error == "montant_banque")
							{
								$('#atm #AtmAlertCode').html("Vous n'avez pas ce montant de crédits dans votre compte bancaire.");
							}
							$('#atm #AtmAlertCode').show();
						break;
						
						case "disconnect":
							$('#atm').hide();						
						break;
					}				
					break;
				}
				
				case 'youtube': {
					console.log("YOUTUBE EVENT " + eventData.toString());
                    if(extraData == "mute"){
                        $('#audio').html('<input type="range" min="0" max="0" value="0" id="jukebox-volume" onchange="player.setVolume(this.value)">');
                    }
                    if(extraData == "stop"){
                        var youtubevideostop = "https://www.youtube.com/watch?v=deddeed";
                        player.loadVideoById(youtubevideostop.split('=')[1].split('&')[0].split('?')[0]);
                        document.getElementById('jukebox-next').innerHTML = "<span>Use <b>:play</b></span> to start a video.";
                    }


                    var option = eventData[1];
                    var youtubevideo = eventData[2];
                    var username = eventData[3];

                    if(player.getPlayerState() != 1 || playmethod == "room" && option == "room" || option == "own"){
                        player.loadVideoById(youtubevideo.split('=')[1].split('&')[0].split('?')[0]);
						
                        document.getElementById('jukebox-next').innerHTML  = "<b>Played by:</b> " + username;
                        playmethod = option;
                    }
                    break;
                }
				
				default: { 
					console.log('No definition for: ' + JSON.stringify(event));
				break;
				}

			}
        };
      
		
   },
	
	bindWanted: function () {
		$("#WantedIcon").click(function () {
			if($('#wanted').is(":visible"))
			{
				$("#wanted").hide();
			}
			else
			{
				$('#wanted .wanted').load("app/templates/clientWanted.php");
				$("#wanted").show();
			}
		});
	},
	
	bindApparts: function () {
		$("#appartInfo .noloyer #loyerAppartButton").click(function () {
			var appartId = $("#loyerAppartId").val();
			var data = "setId," + appartId;
			app['sendData']('appart', data, false, false);
		});
		
		$("#computer .orpi .menu li").click(function () {
			var Id = $(this).attr('id');
			if(Id == "accueil") 
			{
				var data = "orpiLogin";
				app['sendData']('appart', data, false, false);
			}
			else if(Id == "apparts") 
			{
				$('#computer .orpi .louer_appart').hide();
				$('#computer .orpi .home').hide();
				$('#computer .orpi').show();
				$('#computer .orpi .apparts table #appartsRow').load("app/templates/clientGetApparts.php");
				$('#computer .orpi .apparts').fadeIn("slow");
				$('#computer').show();
			}
			
			$("#computer .orpi .menu li").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#computer .orpi .louer_appart i").click(function () {
			$('#computer .orpi .louer_appart').fadeOut("slow");
		});

		$("#computer #topComputer").click(function () {
			if ($('#computer').hasClass('close')) 
			{
				$("#computer").animate({
					marginBottom: '+=424px'
				}, 500);
				$("#computer").removeClass("close");
			}
			else
			{
				$("#computer").animate({
					marginBottom: '-=424px'
				}, 500);
				$("#computer").addClass("close");
			}
		});
		
		$(document).delegate('#computer .orpi .apparts .louerButton', 'click', function(e){
			var Id = $(this).attr('id');
			
			$('#computer .orpi .louer_appart #louerAppartFormId').val(Id);
			$('#computer .orpi .louer_appart').fadeIn("slow");
		});
		
		$("#computer .orpi .louer_appart #louerAppartFormButton").click(function () {
			var appartId = $("#computer .orpi .louer_appart #louerAppartFormId").val();
			var username = $("#computer .orpi .louer_appart #louerAppartFormNickname").val();
			
			var data = "louerAppart," + appartId + "," + username;
			app['sendData']('appart', data, false, false);
		});
	},
	
	bindFontaine: function () {
		$("#foutain #foutainJetter").click(function () {
			var data = "jeter";
			app['sendData']('fontaine', data, false, false);
		});
		
		$("#foutain #foutainRecuperer").click(function () {
			var data = "recuperer";
			app['sendData']('fontaine', data, false, false);
		});
	},

	bindATM: function () {
		$("#atm .code input").keyup(function () {
			if($("#atm_code1").val() != "" && $("#atm_code2").val() != "" && $("#atm_code3").val() != "" && $("#atm_code4").val() != "")
			{
				var pin = $("#atm_code1").val() + $("#atm_code2").val() + $("#atm_code3").val() + $("#atm_code4").val();
				var data = 'checkCode,' + pin;
				app['sendData']('distributeur', data, false, false);
			}
			else
			{
				if (this.value.length == this.maxLength) {
					$(this).next('input').focus();
				}
			}
		});
	
		$("#atm .back").click(function () {
			$('#atm .deposer').hide();	
			$('#atm .retirer').hide();	
			$('#atm .code').hide();	
			$("#atm #AtmAlertCode").hide();
			$('#atm h1').html("Accueil");
			$('#atm .home').show();
		});
		
		$("#atm #retirer").click(function () {
			$('#atm .deposer').hide();	
			$('#atm .code').hide();	
			$("#atm #AtmAlertCode").hide();
			$('#atm .home').hide();
			$('#atm h1').html("Retirer des crédits");
			$('#atm .retirer').show();	
		});
		
		$("#atm #deposer").click(function () {
			$('#atm .retirer').hide();	
			$('#atm .code').hide();	
			$("#atm #AtmAlertCode").hide();
			$('#atm .home').hide();
			$('#atm h1').html("Déposer des crédits");
			$('#atm .deposer').show();	
		});
		
		$("#atm #deposerButton").click(function () {
			var data = "deposer," + $("#atm #deposerMontant").val();
			app['sendData']('distributeur', data, false, false);
		});
		
		$("#atm #retirerButton").click(function () {
			var data = "retirer," + $("#atm #retirerMontant").val();
			app['sendData']('distributeur', data, false, false);
		});
	},
	
	bindGang: function () {
		$("#gang #createGang").click(function () {
			var data = "create," + $("#gang #nomGang").val();
			app['sendData']('gang', data, false, false);
		});
		
		$(document).delegate('#gang #invitGangButton', 'click', function(e){
			var data = "inviter," + $("#gang #invitGangUsername").val();
			app['sendData']('gang', data, false, false);
		});
		
		$(document).delegate('#gang i.up_rank', 'click', function(e){
			var data = "promouvoir," + $(this).attr('id');
			app['sendData']('gang', data, false, false);
		});
		
		$(document).delegate('#gang i.down_rank', 'click', function(e){
			var data = "retrograder," + $(this).attr('id');
			app['sendData']('gang', data, false, false);
		});
		
		$(document).delegate('#gang i.virer_user', 'click', function(e){
			var data = "virer," + $(this).attr('id');
			app['sendData']('gang', data, false, false);
		});
		
		$(document).delegate('#gang i.give_owner', 'click', function(e){
			var data = "owner," + $(this).attr('id');
			app['sendData']('gang', data, false, false);
		});
		
		$(document).delegate('#gang #QuitGang', 'click', function(e){
			var data = "leave";
			app['sendData']('gang', data, false, false);
		});
	},
	
	bindDirecteur: function () {
		$("#rankTravail #promouvoir").click(function () {
			var data = "promouvoir";
			app['sendData']('directeur', data, false, false);
		});
		
		$("#rankTravail #retrograder").click(function () {
			var data = "retrograder";
			app['sendData']('directeur', data, false, false);
		});
	},
	
	bindCoiffure: function () {
		$(document).delegate('#coiffures .coiffures li', 'click', function(e){
			$("#coiffures .coiffures li").removeClass();
			$(this).addClass("active");
			$("#coiffures .colors").show();
		});
		
		$(document).delegate('#coiffures .colors li', 'click', function(e){
			if ($('#coiffures .coiffures li').hasClass('active')) 
			{
				var data = "newCoiffure," + $("#coiffures .coiffures li.active").attr('id') + ',' + $(this).attr('id');
				app['sendData']('coiffure', data, false, false);
				$("#coiffures .colors").hide();
				$("#coiffures").hide();
			}
		});
	},
	
	bindPhone: function () {
		$("#phone #top").click(function () {
			if(user.canUsePhone == false)
				return;

			if ($('#phone').hasClass('close')) 
			{
				$("#phone").animate({
					marginBottom: '+=420px'
				}, 500);
				$("#phone").removeClass("close");
				$('#phone #menu #tel_sms .notifications').load("app/templates/clientGetMessageNotifications.php?id=" + user.id);
				var text = $('#phone #menu #tel_sms .notifications').text();
				if(text == "0") 
				{
					$('#phone #menu #tel_sms .notifications').hide();
				}
				else
				{
					$('#phone #menu #tel_sms .notifications').show();
				}
				var data = 'open';
				app['sendData']('telephone', data, false, false);
			}
			else
			{
				if(user.appel == false)
				{
					$("#phone").animate({
						marginBottom: '-=420px'
					}, 500);
					var data = 'close';
					app['sendData']('telephone', data, false, false);
					$("#phone").addClass("close");
				}
			}
		});
		
		$("#phone #home").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$('#phone #sms').hide();
			$('#phone #sms_user').hide();
			$('#phone #contacts').hide();
			$('#phone #calculatrice').hide();
			$('#phone #banque').hide();
			$('#phone #appel').hide();
			$('#phone #appel_user').hide();
			$('#phone #youtube #yt_iframe').attr('src', 'https://www.youtube.com/embed/?autoplay=1');
			$('#phone #youtube').hide();
			$('#phone #bouygues').hide();
			$('#phone #flappy').hide();
			$('#phone #menu #tel_sms .notifications').load("app/templates/clientGetMessageNotifications.php?id=" + user.id);
			var text = $('#phone #menu #tel_sms .notifications').text();
			if(text == "0") 
			{
				$('#phone #menu #tel_sms .notifications').hide();
			}
			else
			{
				$('#phone #menu #tel_sms .notifications').show();
			}
			$('#phone #menu').fadeIn("slow");
		});
		
		$("#phone #menu #tel_phone").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$('#phone #menu').hide();
			
			if(user.appel == true)
			{
				$('#phone #appel_user').hide();
				$('#phone #appel').fadeIn("slow");
			}
			else
			{
				$('#phone #appel').hide();
				$('#phone #appel_user').fadeIn("slow");
			}
		});
		
		$("#phone #menu #tel_contact").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$('#phone #menu').hide();
			
			var data = 'contacts';
			app['sendData']('telephone', data, false, false);
		});
		
		$("#phone #menu #tel_sms").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$('#phone #menu').hide();
			if(user.Reseau > 1)
			{
				$('#phone #sms').load("app/templates/clientGetMessages.php?id=" + user.id);
			}
			$('#phone #sms').fadeIn("slow");
		});
		
		$(document).delegate('#phone #sms .row', 'click', function(e){
			if(user.canUsePhone == false)
				return;
			
			var userId = $(this).attr('id');
			user.ActiveSms = userId;
			$('#phone #sms').hide();
			$('#phone #sms_user').load("app/templates/clientGetMessage.php?id=" + user.id + "&&user_id=" + userId);
			$('#phone #sms_user').fadeIn("slow");
		});
		
		$(document).delegate('#phone #sms_user .call', 'click', function(e){
			if(user.canUsePhone == false)
				return;
			
			var username = $(this).attr('id');
			var data = "appel_user," + username;
			app['sendData']('telephone', data, false, false);
		});
		
		$(document).delegate('#phone #sms_user #MessageValue', 'keypress', function(event){
			if(event.keyCode == 13){
				var userId = $("#phone #sms_user #userMessageValue").val();
				var message = $("#phone #sms_user #MessageValue").val();
				var data = "sms," + userId + "," + message;
				app['sendData']('telephone', data, false, false);
			}
		});
		
		$(document).delegate('#phone #sms_user .position', 'click', function(e){
			var userId = $("#phone #sms_user #userMessageValue").val();
			var message = "%/send_localisation/%";
			var data = "sms," + userId + "," + message;
			app['sendData']('telephone', data, false, false);
		});
		
		$("#phone #menu #tel_flappy").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$('#phone #menu').hide();
			$('#phone #flappy').fadeIn("slow");
		});
		
		
		$("#phone #menu #tel_banque").click(function () {
			if(user.canUsePhone == false)
				return;
			
			var data = 'banque';
			app['sendData']('telephone', data, false, false);
		});
		
		$("#phone #menu #tel_bouygues").click(function () {
			if(user.canUsePhone == false)
				return;
			
			var data = 'bouygues';
			app['sendData']('telephone', data, false, false);
		});
		
		$("#phone #tel_youtube").click(function () {
			if(user.canUsePhone == false)
				return;
			
			var data = 'youtube';
			app['sendData']('telephone', data, false, false);
		});
		
		$("#phone #bouygues #resetForfait").click(function () {
			if(user.canUsePhone == false)
				return;
			
			var data = 'renouveler';
			app['sendData']('telephone', data, false, false);
		});
		
		$("#phone #menu #tel_calculatrice").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$('#phone #menu').hide();
			$('#phone #calculatrice').fadeIn("slow");
		});
		
		$(document).delegate('#phone #contacts .call', 'click', function(e){
			if(user.canUsePhone == false)
				return;
			
			var username = $(this).attr('id');
			var data = "appel_user," + username;
			app['sendData']('telephone', data, false, false);
		});
		
		$(document).delegate('#phone #contacts .sms', 'click', function(e){
			if(user.canUsePhone == false)
				return;
			
			var userId = $(this).attr('id');
			user.ActiveSms = userId;
			$('#phone #contacts').hide();
			$('#phone #sms_user').load("app/templates/clientGetMessage.php?id=" + user.id + "&&user_id=" + userId);
			$('#phone #sms_user').fadeIn("slow");
		});
		
		$(document).delegate('#phone #contacts .delete', 'click', function(e){
			if(user.canUsePhone == false)
				return;
			
			var userId = $(this).attr('id');
			var data = "delete," + userId;
			app['sendData']('telephone', data, false, false);
		});
		
		$("#phone #calculatrice .number").click(function () {
			if(user.canUsePhone == false)
				return;
			
			var thisNumber = $(this).attr('id');
			$("#phone #calculatrice #resultat").html($('#phone #calculatrice #resultat').html() + thisNumber);
		});
		
		$("#phone #calculatrice .clean_button").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$("#phone #calculatrice #resultat").html("");
		});
		
		$("#phone #calculatrice .btn_plus").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$("#phone #calculatrice #resultat").html($('#phone #calculatrice #resultat').html() + "+");
		});
		
		$("#phone #calculatrice .btn_moins").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$("#phone #calculatrice #resultat").html($('#phone #calculatrice #resultat').html() + "-");
		});
		
		$("#phone #calculatrice .btn_division").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$("#phone #calculatrice #resultat").html($('#phone #calculatrice #resultat').html() + "/");
		});
		
		$("#phone #calculatrice .btn_multi").click(function () {
			if(user.canUsePhone == false)
				return;
			
			$("#phone #calculatrice #resultat").html($('#phone #calculatrice #resultat').html() + "*");
		});
		
		$("#phone #calculatrice .btn_egal").click(function () {
			if(user.canUsePhone == false)
				return;
			
			var egal = eval($('#phone #calculatrice #resultat').html());
			$("#phone #calculatrice #resultat").html(egal);
		});
		
		$("#phone .eteindre").click(function () {
			if(user.canUsePhone == false)
				return;
			
			if(user.appel == true)
				return;
			
			$('#phone #sms').hide();
			$('#phone #sms_user').hide();
			$('#phone #contacts').hide();
			$('#phone #banque').hide();
			$('#phone #bouygues').hide();
			$('#phone #appel_user').hide();
			$('#phone #youtube #yt_iframe').attr('src', '');
			$('#phone #youtube').hide();
			$('#phone #appel').hide();
			$('#phone #menu').fadeIn("slow");
				
			$("#phone").animate({
				marginBottom: '-=420px'
			}, 500);
			$("#phone").addClass("close");
			var data = 'eteindre';
			app['sendData']('telephone', data, false, false);
		});
	
		$("#phone #appel_user #appel_user_button").click(function () {
			if(user.canUsePhone == false)
				return;
			
			var data = 'appel_user,' + $("#appel_user_userId").val();
			app['sendData']('telephone', data, false, false);
		});
		
		$("#appel #repondre").click(function () {
			if(user.canUsePhone == false)
				return;
			
			user.AudioSonnerie.pause();
			user.AudioSonnerie.currentTime = 0;
			var data = 'decrocher';
			app['sendData']('telephone', data, false, false);
		});
		
		$("#appel #raccrocher").click(function () {
			if(user.canUsePhone == false)
				return;
			
			user.AudioSonnerie.pause();
			user.AudioSonnerie.currentTime = 0;
			var data = 'raccrocher';
			app['sendData']('telephone', data, false, false);
		});
	},
	
	bindTrade: function () {
		$("#tradeUser .close, #tradeUser #CancelTradeButton").click(function () {
			var data = 'cancelTrade';
			app['sendData']('trade', data, false, false);
		});
		
		$("#tradeUser .close, #tradeUser #ValideTradeButton").click(function () {
			var data = 'confirmTrade';
			app['sendData']('trade', data, false, false);
		});
		
		$("#tradeUser .montantTrade #montantTradeButton").click(function () {
			var activeItem = $("#tradeUser .my_items").find(".active");
			var name = activeItem.attr('id');
			var image = activeItem.find('img')[0].src;
			var montant = $("#tradeUser .montantTrade #montantTradeInputMontant").val();
			var data = 'addItems,' + name + ',' + montant + ',' + image;
			app['sendData']('trade', data, false, false);
		});
		
		$("#tradeUser .my_items li").click(function () {
			$("#tradeUser .my_items li").removeClass("active");
			$(this).addClass("active");
			
			if ($(this).hasClass('choose')) {
				$("#tradeUser .montantTrade").slideDown();
			}
			else
			{
				$("#tradeUser .montantTrade").hide();
				var name = $(this).attr('id');
				var image = $(this).find('img')[0].src;
				
				var data = 'addItems,' + name + ',0,' + image;
				app['sendData']('trade', data, false, false);
			}
		});
		
		$(document).delegate('#tradeUser .myProposition #myPropositionTrade li', 'click', function(e){
			var name = $(this).attr('id');
				
			var data = 'removeItems,' + name;
			app['sendData']('trade', data, false, false);
		});
	},
	
	bindItem: function () {
		$(document).delegate('#myPerso .list .item', 'click', function(e){
			if($(this).is("#coca"))
			{
				var data = 'boire,coca';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#fanta"))
			{
				var data = 'boire,fanta';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#doliprane"))
			{
				var data = 'medicament,doliprane';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#cigarette"))
			{
				var data = 'fumer,cigarette';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#weed"))
			{
				var data = 'fumer,weed';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#pain"))
			{
				var data = 'manger,pain';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#sucette"))
			{
				var data = 'manger,sucette';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#audia8"))
			{
				var data = 'conduire,audia8';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#audia3"))
			{
				var data = 'conduire,audia3';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#whiteHoverboard"))
			{
				var data = 'conduire,whiteHoverboard';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#porsche911"))
			{
				var data = 'conduire,porsche911';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#fiatpunto"))
			{
				var data = 'conduire,fiatpunto';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#volkswagenjetta"))
			{
				var data = 'conduire,volkswagenjetta';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#bmwi8"))
			{
				var data = 'conduire,bmwi8';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#blackHoverboard"))
			{
				var data = 'conduire,blackHoverboard';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#pinkHoverboard"))
			{
				var data = 'conduire,pinkHoverboard';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#police"))
			{
				var data = 'conduire,police';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#gouvernement"))
			{
				var data = 'conduire,gouvernement';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#batte"))
			{
				var data = 'arme,batte';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#sabre"))
			{
				var data = 'arme,sabre';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#uzi"))
			{
				var data = 'arme,uzi';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#ak47"))
			{
				var data = 'arme,ak47';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#cocktail"))
			{
				var data = 'arme,cocktail';
				app['sendData']('item', data, false, false);
			}
			else if($(this).is("#taser"))
			{
				var data = 'arme,taser';
				app['sendData']('item', data, false, false);
			}
		});
	},
	
	bindVoiture: function () {
		$('#radio select').change(function(){
			if(user.isConduit == true)
			{
				if($( "#radio select option:selected" ).text() == "Aucune")
				{
					user.RadioVoiture.pause();
				}  
				else if($( "#radio select option:selected" ).text() == "NRJ")
				{
					user.RadioVoiture.pause();
					user.RadioVoiture = new Audio("http://cdn.nrjaudio.fm/audio1/fr/30001/mp3_128.mp3?origine=fluxradios");
					user.RadioVoiture.play();
				}
				else if($( "#radio select option:selected" ).text() == "Fun Radio")
				{
					user.RadioVoiture.pause();
					user.RadioVoiture = new Audio("http://streaming.radio.funradio.fr/fun-1-48-192");
					user.RadioVoiture.play();
				} 	
				else if($( "#radio select option:selected" ).text() == "Skyrock")
				{
					user.RadioVoiture.pause();
					user.RadioVoiture = new Audio("http://www.skyrock.fm/stream.php/tunein16_128mp3.mp3");
					user.RadioVoiture.play();
				} 	
				else if($( "#radio select option:selected" ).text() == "Virgin Radio")
				{
					user.RadioVoiture.pause();
					user.RadioVoiture = new Audio("http://vr-live-mp3-128.scdn.arkena.com/virginradio.mp3");
					user.RadioVoiture.play();
				} 	
			}			
		});
	},
	
	bindPanier: function () {	
		$("#panier #coca").click(function () {
			var data = 'remove,coca';
			app['sendData']('panier', data, false, false);
		});
		
		$("#panier #fanta").click(function () {
			var data = 'remove,fanta';
			app['sendData']('panier', data, false, false);
		});
		
		$("#panier #eau").click(function () {
			var data = 'remove,eau';
			app['sendData']('panier', data, false, false);
		});
		
		$("#panier #pain").click(function () {
			var data = 'remove,pain';
			app['sendData']('panier', data, false, false);
		});
		
		$("#panier #sucette").click(function () {
			var data = 'remove,sucette';
			app['sendData']('panier', data, false, false);
		});
		
		$("#panier #savon").click(function () {
			var data = 'remove,savon';
			app['sendData']('panier', data, false, false);
		});
		
		$("#panier #doliprane").click(function () {
			var data = 'remove,doliprane';
			app['sendData']('panier', data, false, false);
		});
	},
	
	bindTransaction: function () {	
		$(".transaction #accepter").click(function () {
			if(user.payement == true)
			{
				$('#transaction .transaction .transaction_code').hide();
				$('#transaction .transaction .transaction_choice').hide();
				$('#transaction .transaction .transaction_moyen').show();
			}
			else
			{
				var data = 'accepter,default';
				app['sendData']('transaction', data, false, false);
				$('#transaction').hide();
			}
		});
		
		$(".transaction #refuser").click(function () {
			var data = 'refuser';
			app['sendData']('transaction', data, false, false);
			$('#transaction').hide();
		});
		
		$(".transaction .transaction_moyen #moyen_cb").click(function () {
			if(user.payement == true)
			{
				var data = 'checkIfGetCB';
				app['sendData']('transaction', data, false, false);
			}
			else
			{
				var data = 'accepter,default';
				app['sendData']('transaction', data, false, false);
				$('#transaction').hide();
			}
		});
		
		$(".transaction .transaction_moyen #moyen_credits").click(function () {
			var data = 'accepter,default';
			app['sendData']('transaction', data, false, false);
			$('#transaction').hide();
		});
		
		$(".transaction .code input").keyup(function () {
			if($("#transaction_code1").val() != "" && $("#transaction_code2").val() != "" && $("#transaction_code3").val() != "" && $("#transaction_code4").val() != "")
			{
				var pin = $("#transaction_code1").val() + $("#transaction_code2").val() + $("#transaction_code3").val() + $("#transaction_code4").val();
				var data = 'checkCode,' + pin;
				app['sendData']('transaction', data, false, false);
			}
			else
			{
				if (this.value.length == this.maxLength) {
					$(this).next('input').focus();
				}
			}
		});
	}, 
	
	bindEvenements: function () {
		$("#eventMission").click(function () {
			$("#eventMission").hide("slide", {direction: "right"}, 500);
		});
		
		$("#eventRecompense .close").click(function () {
			$("#eventRecompense").fadeOut("slow");
		});
	}, 
	
	bindCasino: function () {
		$("#slot_machine #slot_machine_turn").click(function () {
			var data = 'slot';
			app['sendData']('casino', data, false, false);
		});
		
		$("#RouletteIcon").click(function () {
			if($('#roulette_casino').is(":visible"))
			{
				$("#roulette_casino").hide();
			}
			else
			{
				$("#roulette_casino").show();
			}
		});
	}, 
	
	bindGps: function () {
		$('body').keyup(function(e) {
			var code = e.keyCode || e.which;
			if (code == '9') {
				if ($("#map_content iframe").css("display") == "none")
				{
					$("#map_content iframe").attr("src", "map.php?user_id=" + user.id);
					$("#map_content .close").fadeIn('fast');
					$("#map_content iframe").fadeIn('fast');
				}
				else
				{
					$("#map_content .close").fadeOut('fast');
					$("#map_content iframe").fadeOut('fast');
				}
			}
		});
	}, 
	
	bindCasier: function () {
		$("#casierUser .row").click(function () {
			var NameItem = $(this).attr('id');
			$("#casierUser .deposer").hide();
			$("#casierUser .retirer").hide();
			$("#casierUser #casierTypeItem").val(NameItem);
			$("#casierUser .action_casier").slideDown();
		});
		
		$("#casierUser #casierDepotButton").click(function () {
			$("#casierUser .action_casier").hide();
			$("#casierUser .deposer").slideDown();
		});
		
		$("#casierUser #casierRetirerButton").click(function () {
			$("#casierUser .action_casier").hide();
			$("#casierUser .retirer").slideDown();
		});
		
		$("#casierUser #casierDepotItemButton").click(function () {
			var typeItem = $("#casierUser #casierTypeItem").val();
			var montant = $("#casierUser #casierMontantDepotItem").val();
			
			var data = 'deposer,' + typeItem + ',' + montant;
			app['sendData']('casier', data, false, false);
		});
		
		$("#casierUser #casierRetirerItemButton").click(function () {
			var typeItem = $("#casierUser #casierTypeItem").val();
			var montant = $("#casierUser #casierMontantRetirerItem").val();
			
			var data = 'retirer,' + typeItem + ',' + montant;
			app['sendData']('casier', data, false, false);
		});
	},
	
	bindChangeLook: function () {
		$(document).delegate('#changeLook .look .row', 'click', function(e){
			$("#changeLook .look .row").removeClass("inactive");
			$("#changeLook .look .row").removeClass("active");
			$("#changeLook .look .row").addClass("inactive");
			$(this).removeClass("inactive");
			$(this).addClass("active");
			if ($(this).hasClass('bonnet')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=bonnet")
			}
			else if ($(this).hasClass('lunette')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=lunettes")
			}
			else if ($(this).hasClass('echarpe')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=echarpe")
			}
			else if ($(this).hasClass('moustache')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=accessoire")
			}
			else if ($(this).hasClass('ceinture')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=ceinture")
			}
			else if ($(this).hasClass('peau')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=peau")
			}
			else if ($(this).hasClass('teeshirt')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=teeshirt")
			}
			else if ($(this).hasClass('pantalon')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=pantalon")
			}
			else if ($(this).hasClass('chaussure')) {
				$('#changeLook .changeLookName').load("app/templates/changeLook.php?look=chaussure")
			}
		});
		
		$(document).delegate('#changeLook #item li', 'click', function(e){
			$("#changeLook #item li").removeClass("active");
			$(this).addClass("active");
			var codeLook = $(this).attr('id');
			var type = $('#changeLook .look .row.active').attr('id');
			
			if(codeLook == "none")
			{
				var data = 'editLook,' + type + ',0,0';
				app['sendData']('look', data, false, false);
				$("#changeLook .infosLook").fadeOut('fast');
			}
			else if(type == "hd")
			{
				var data = 'editLook,' + type + ',' + codeLook + ',2';
				app['sendData']('look', data, false, false);
				$("#changeLook .infosLook").fadeOut('fast');
			}
			else
			{
				$('#changeLook #colorList').load("app/templates/look_color.php?id="+codeLook);
				$("#changeLook .color").fadeIn('fast');
			}
		});

		$(document).delegate('#changeLook #colorList li', 'click', function(e){
			var type = $('#changeLook .look .row.active').attr('id');
			var code = $("#changeLook #item li.active").attr('id');
			var color = $(this).attr('id');
			var data = 'editLook,' + type + ',' + code + ',' + color;
			app['sendData']('look', data, false, false);
			$("#changeLook .infosLook").fadeOut('fast');
		});
		
		$(document).delegate('#changeLook .closeButton', 'click', function(e){
			$("#changeLook .infosLook").fadeOut('fast');
		});
		
		$(document).delegate('#hem .look .row', 'click', function(e){
			$("#hem .look .row").removeClass("inactive");
			$("#hem .look .row").removeClass("active");
			$("#hem .look .row").addClass("inactive");
			$(this).removeClass("inactive");
			$(this).addClass("active");
			if ($(this).hasClass('bonnet')) {
				$('#hem .changeLookName').load("app/templates/lookHeM.php?look=bonnet")
			}
			else if ($(this).hasClass('lunette')) {
				$('#hem .changeLookName').load("app/templates/lookHeM.php?look=lunettes")
			}
			else if ($(this).hasClass('echarpe')) {
				$('#hem .changeLookName').load("app/templates/lookHeM.php?look=echarpe")
			}
			else if ($(this).hasClass('moustache')) {
				$('#hem .changeLookName').load("app/templates/lookHeM.php?look=accessoire")
			}
			else if ($(this).hasClass('ceinture')) {
				$('#hem .changeLookName').load("app/templates/lookHeM.php?look=ceinture")
			}
			else if ($(this).hasClass('teeshirt')) {
				$('#hem .changeLookName').load("app/templates/lookHeM.php?look=teeshirt")
			}
			else if ($(this).hasClass('pantalon')) {
				$('#hem .changeLookName').load("app/templates/lookHeM.php?look=pantalon")
			}
			else if ($(this).hasClass('chaussure')) {
				$('#hem .changeLookName').load("app/templates/lookHeM.php?look=chaussure")
			}
		});
		
		$(document).delegate('#hem .closeButton', 'click', function(e){
			$("#hem .infosLook").fadeOut('fast');
		});
		
		$(document).delegate('#hem #itemHem li', 'click', function(e){
			$("#hem #itemHem li").removeClass("active");
			$(this).addClass("active");
			var codeLook = $(this).attr('id');
			$('#hem #colorListHem').load("app/templates/look_colorHem.php");
			$("#hem .color").fadeIn('fast');
		});
		
		$(document).delegate('#hem #colorListHem li', 'click', function(e){
			var type = $('#hem .look .row.active').attr('id');
			var code = $("#hem #itemHem li.active").attr('id');
			var color = $(this).attr('id');
			var data = 'buylook,' + type + ',' + code + ',' + color;
			app['sendData']('look', data, false, false);
			$("#hem .infosLook").fadeOut('fast');
		});
	}, 
};