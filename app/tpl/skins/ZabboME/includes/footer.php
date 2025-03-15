<footer class="container-fluid footer first">
<div class="container">
    <div class="row">
      <div class="col-lg-6 randomavatar">
        <h4>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"><b>{shortname} Members</b></font>
          </font>
        </h4>
		<?php
		$displayedUsernames = array();
		$getRandom = mysql_query("SELECT username,look FROM users WHERE look <> 'hd-180-1.ch-210-66.lg-270-82.sh-290-91.hr-100' AND username NOT IN ('" . implode("','", $displayedUsernames) . "') ORDER BY RAND() LIMIT 14");
		$i = 0;
		while ($randomHabbo = mysql_fetch_assoc($getRandom)) {
			$displayedUsernames[] = $randomHabbo['username'];
			$avatarClass = ($i % 2 == 0) ? 'avatar dark-gray' : 'avatar light-gray';
			echo '
			<a href="/home/' . $randomHabbo['username'] . '">
			<div class="' . $avatarClass . '">
			<img src="{imager}' . $randomHabbo['look'] . '&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;headonly=1" data-toggle="tooltip" data-placement="top" title="" data-original-title=" ' . $randomHabbo['username'] . '">
			</div>
			</a>
			';
			$i++;
		}
		?>
	</div>
      <div class="col-lg-3 col-xs-6">
        <h4>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"><b>{shortname} Socials</b></font>
          </font>
        </h4>
        <ul class="social">
			<li><a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
			<li><a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
			<li><a href="#" target="_blank"><i class="fab fa-snapchat-square"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li><br>
			<li><a href="{discord}" target="_blank"><i class="fab fa-discord"></i></a></li>
        </ul>
        </div>
        <div class="col-lg-3 col-xs-6">
          <h4>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;"><b>Bottom Menu</b></font>
            </font>
          </h4>
          <ul>		  
			<li>
				<a href="/playing-zabbo/how-to-play" target="_blank">
					<font style="vertical-align: inherit;">
						<font style="vertical-align: inherit;">How To Play {shortname}</font>
					</font>
				</a>
			</li>		
			<li class="removeonbreakpoint">
				<a href="/store" target="_blank">
					<font style="vertical-align: inherit;">
						<font style="vertical-align: inherit;">{shortname} Store</font>
					</font>
				</a>
			</li>			
          	<li>
				<a href="/playing-zabbo/what-is-zabbo" target="_blank">
					<font style="vertical-align: inherit;">
						<font style="vertical-align: inherit;">What's {shortname}</font>
					</font>
				</a>
			</li>	  
			<li>
				<a href="/playing-zabbo/zabbo-way" target="_blank">
					<font style="vertical-align: inherit;">
						<font style="vertical-align: inherit;">{shortname} Ways</font>
					</font>
				</a>
			</li>
          </ul>
        </div>
    </div>
</div>
</footer>
<footer class="container-fluid footer second">
  <font style="color: #868e96;vertical-align: inherit;">
    <font style="vertical-align: inherit;">
	<span class="specialthanks">© 2015 ~ <?php echo date("Y"); ?></span>
    <br>
	<span class="specialthanks">Credits to Revue for the theme</span><br />	 
	<span class="specialthanks">{shortname}.ME theme is maintained by Justin</span>
    <br>
    <span class="specialthanks"><i>All rights go to their respective owner(s).
    {shortname}.ME is not endorsed, affiliated or offered by Sulake Corporation Oy.
    This project is for educational purposes only</i>.
	</span>
  </font>
</font>
<!--<div class="snowflakes" aria-hidden="true">
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
<div class="snowflake">
❅
</div>
<div class="snowflake">
❆
</div>
</div>-->
<a href="{discord}" class="animated shake" target="_blank" style="box-shadow: 2px 2px 10px rgba(0,0,0,.2);display: block; position: fixed; bottom: 15px; right: 15px; border-radius: 100px; padding: 10px 15px; animation: flipInX 1s; background: #7289da;"><img src="data:image/gif;base64,R0lGODlhKAAoAPcAAAAAAP////v7/v39//z8/v7+//39/vX2/Ojr+e/x+/f4/fb3/MLL79Xb9Nfd9dbc9OPn+Ort+uvu+vDy+/Hz+/n6/mR912Z/12eA12mC2GqC2GmB12uD2GyE2W2F2WyE2G6F2W6G2W+G2W+H2XCH2nCI2nGI2nCH2XKJ2nSK23SL23aM23iO3HmP3HqP3HqQ3HyR3XyR3ICU3oCV3n+U3YGW3oKW3oSY34WZ34mc4Iqd4Iue4Yyf4Y2f4Y2g4Y+h4pKk4pan5Jeo5Jan45mp5Jqq5Zur5Z2t5pys5Z6u5aGw5qe16Ku56ay56a266q676q266bC966+86rG+67K+67rF7b3H7cDK77/J7sHL78LM78jR8cfQ8NHY89Tb9NPa89Xc9Nnf9drg9d7j9uDl9+fr+fL0+2qD2GuE2HGJ2n2T3Y+i4pSm45qr5aW056a157K/67G+6rPA677J7sTO8MXP8MzV8svU8dDY89jf9d3j9+Hm9+Po+Ojs+d7k9uXq+Oru+uvv+u/y+/r7/vv8/v3+//7///3+/v///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAIgALAAAAAAoACgAAAj/ABEJHEiwoMGDCBMKRMGwocOHECMqjEixokSEFjNmPKixI0WOHkM2BCkyJMmSHU9SNHHiIUuNKh9+4PCChggPHz54YDEjhIaWHw1SFIEmSBQnQtT0GALERg84Vpi40BC0YMQRMK48yFLFj4IAYAUgYDBHzJgiHi5ahQgCDAU+BcDKnRsAkIQCaz5AjOnhhwG6gOneQbNX6MMMdQIrBjvIhoiHKkusALR4sZszkA03REMEMAHAA+jmSetQZQY5cwWxqaFFLoQdOL7MncACKEOVHbzMnWKBw4oJAQwFubDhxiC5hXiQvq0ZBQkWguYuwUCCRJkAhXJwCOHiwNwmVEc24w9hfG6YFBqOhA7AxQMHKnSvhGe+lqEHHYfoRhhDaO6fPYaAFVcAW3BQWnMe+CBXH14sUJkEXlQAVhcGilefcyz4AZYBeLyBBRnHyWWGF3FAEYiASnRw4IUogNCCHXIJYIQGOAiRBBJAvIBCA3IJgkSFFhIEUQghtEFHGXrEMEIIaHDAwQcjeCBFAg48IcN8QQ4UkQkcaKCCCiNQdAILIGjwWGEsumRCRWmckEZFMaEEZ3NyWhRnnWgKiedGd4qEiFpporRQZhjhqeWKCiWqKKKKNlooCo5GmhB9klaqpaWYGhQQADs="></a>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</script>
</footer>

