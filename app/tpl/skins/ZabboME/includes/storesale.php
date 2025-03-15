<script>
var countDownDate = new Date("July 5, 2022 15:37:25").getTime();

  var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<div class="alert alert-danger" style="text-align: justify;">
<div class="col-1 alert-icon-col">
<center><strong>Hey {username}!,</strong> The <b>store</b> has been revamped with a new system that includes VIP Gifting, check it out! <br>
<a href="/store" target="_blank">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">New Store</font></font></a> | 
<a href="/store/vip" target="_blank">
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VIP Memberships</font></font></a>
<!--<br>
<b>Remaining Time Left: </b><i id="demo"></i>-->
</center>
</div></div>

<style>
.alert.alert-success {
    background: #27ae60;
    color: #FFF;
}
table {
    width: 100%;
    font-size: 14px;
    background-color: #b3b3b300;
}
</style>