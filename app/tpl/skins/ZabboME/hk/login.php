<?php

$USER = mysql_query('SELECT theme, rank FROM users WHERE id = "'. $_SESSION['user']['id'] . '"');

$USERR = mysql_fetch_assoc($USER);

if($USERR['rank'] >= 8 && $_SESSION["in_hk"] != false)
{
header("Location:".$_CONFIG['hotel']['url']."/ase/main");
exit;
}
?>
<!DOCTYPE html>

<html>

    <title>{shortname} ~ Management Panel</title>

  <head>
	
	<link type="text/css" rel="stylesheet" href="/app/tpl/skins/{skin}/assets/css/materialize.min.css?<?php echo time(); ?>" />

	<link type="text/css" rel="stylesheet" href="/app/tpl/skins/{skin}/assets/css/alert.css?<?php echo time(); ?>"/>

	<?php

	if($USERR['theme'] == 'light') {
		
		echo '<link rel="stylesheet" href="/app/tpl/skins/{skin}/assets/css/style.css?' .time(). '">';
		
	}

	if($USERR['theme'] == 'dark') {
		
		echo '<link rel="stylesheet" href="/app/tpl/skins/{skin}/assets/css/dark_style.css?' .time(). '">';
		
	}

	else
		
	{
		echo '<link rel="stylesheet" href="/app/tpl/skins/{skin}/assets/css/style.css?' .time(). '">';
	}

	?>
	
  </head>
  	
<div class="section container" align="center" style="margin-top: 50px;">

  <div class="row">
  
    <div style="padding: 2%; width: 50%;">
	
      <div class="box">
	  
        <div class="card-panel" style="background-color: rgb(255, 255, 255); color: <?php if($USERR['theme'] == 'light') { echo '#81a0af'; } if($USERR['theme'] == 'dark') { echo '#2b2e3a'; } ?>;">
		
          <div class="row">
		  
            <div>   
			
				<h5>Hotel Management Panel</h5>
							  
				<hr style="margin-top: 35px; border: 1px dashed #dddddd; border-top: 0px;">
							  
				</br>
							  
				<img src="/app/tpl/skins/{skin}/hk/images/PNG/key.png?<?php echo time(); ?>"/>
							  
				</br>
				
				</br>
			  
				<form method="post" style="padding: 2.5%;">
				
					<div>

						<?php 
						
							if (isset($template->form->error)) {
								
								echo '<div class="{skin}ert wrong" style="border: solid 2px black; border-radius: 4px; text-transform: uppercase; font-weight: 600;">'.$template->form->error.'</div></br>'; 
							
							}
						
						?>
					
					</div>

					<div data-validate="Username is Required">
					
						<input type="text" name="username" placeholder="Enter your username..">
						
					</div>		
					
					<div data-validate="Password is Required">
					
						<input type="password" name="password" placeholder="Enter your password..">
						
					</div>
					
					<div data-validate="Pin is Required">
					
						<input type="password" name="log_pin" pattern="[0-9]{4}" maxlength="4" placeholder="Enter your staff pin.." autocomplete="off">
					
					</div>
					
					</br>
					
					<div>
					
						<button class="btn waves-effect waves-light grey darken-3" name="login">Login</button>
						
					</div>	

				</form>
			  
            </div>
			
          </div>
		  
        </div>
		
      </div>
	  
    </div>
	
  </div>
  
</div> 
	</body>

</html>