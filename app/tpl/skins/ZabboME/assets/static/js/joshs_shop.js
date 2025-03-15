$( document ).ready(function() {
	
	$.ajax({
			url: "/ajax",
			dataType: "text",
			method: 'POST',
			data: {request:'shop-data'}
		}).done(function(data) {
			obj = JSON.parse(data);
			
			$("#shop-data").slideUp(400);
			$("#shop-data").html(obj.html);
			$("#shop-data").slideDown(1000);
			
			console.log('\n\n\n Don\'t rip this pls xoxox\n\n\nShop data loaded.');
		}).fail(function(data) {
			$("#shop-data").slideUp(400);
			setTimeout("$('#shop-data').html('<center>Error loading shop data...</center>');", 400);
			$("#shop-data").slideDown(1000);
		});
	$.ajax({
			url: "/ajax",
			dataType: "text",
			method: 'POST',
			data: {request:'add-to-cart'}
		}).done(function(data) {
			obj = JSON.parse(data);
			
			$("#cart-content").slideUp(400);
			$('#cart-content').html(obj.html + '<hr>');
			$("#cart-content").slideDown(1000);
			
		}).fail(function(data) {
			$("#cart-content").slideUp(400);
			setTimeout("$('#cart-content').html('<center>Error loading shop data...</center>');", 400);
			$("#cart-content").slideDown(1000);
		});
	
});
	function addToCart(item_id) {		
		$.ajax({
			url: "/ajax",
			dataType: "text",
			method: 'POST',
			data: {request:'add-to-cart', item_id: item_id}
		}).done(function(data) {
			obj = JSON.parse(data);
			
			$("#cart-content").slideUp(400);
			setTimeout("$('#cart-content').html(obj.html + '<hr>');", 400);
			$("#cart-content").slideDown(1000);
			
		}).fail(function(data) {
			$("#cart-content").slideUp(400);
			setTimeout("$('#cart-content').html('<center>Error loading shop data...</center>');", 400);
			$("#cart-content").slideDown(1000);
		});	
	};
	function updateCart() {		
		$.ajax({
			url: "/ajax",
			dataType: "text",
			method: 'POST',
			data: {request:'add-to-cart'}
		}).done(function(data) {
			obj = JSON.parse(data);
			
			$("#cart-content").slideUp(400);
			setTimeout("$('#cart-content').html(obj.html + '<hr>');", 400);
			$("#cart-content").slideDown(1000);
			
		}).fail(function(data) {
			$("#cart-content").slideUp(400);
			setTimeout("$('#cart-content').html('<center>Error loading shop data...</center>');", 400);
			$("#cart-content").slideDown(1000);
		});
	};
	function clearCart() {		
		$.ajax({
			url: "/ajax",
			dataType: "text",
			method: 'POST',
			data: {request:'clear-cart'}
		}).done(function(data) {
			obj = JSON.parse(data);
			if(obj.resp == true){
				updateCart();
			}else{
				alert('Something in the shop went wrong. Please reload.');
			}
			
		}).fail(function(data) {
			alert('Something in the shop went wrong. Please reload.');
		});	
	};
	
	function setMsg(msg){
		$("#pack-deets").slideUp(400);
		$('#pack-deets').html(msg);
		$("#pack-deets").slideDown(1000);
	}
	function buyStuff(){
		$.ajax({
			url: "/ajax",
			dataType: "text",
			method: 'POST',
			data: {request:'set-packs'}
		}).done(function(data) {
			obj = JSON.parse(data);
			if(obj.resp == true){
				window.top.location = '/paypal/buy.php';
			}else{
				alert('Purchase error!\n\n\nPlease contact a staff ASAP!');
			}
		})
	}
	function refreshStore(){
	$.ajax({
			url: "/ajax",
			dataType: "text",
			method: 'POST',
			data: {request:'shop-data'}
		}).done(function(data) {
			obj = JSON.parse(data);
			
			$("#shop-data").slideUp(400);
			setTimeout("$('#shop-data').html(obj.html);", 400);
			$("#shop-data").slideDown(1000);
			
			console.log('\n\n\n Don\'t rip this pls xoxox\n\n\nShop data loaded.');
		}).fail(function(data) {
			$("#shop-data").slideUp(400);
			setTimeout("$('#shop-data').html('<center>Error loading shop data...</center>');", 400);
			$("#shop-data").slideDown(1000);
		});
	}