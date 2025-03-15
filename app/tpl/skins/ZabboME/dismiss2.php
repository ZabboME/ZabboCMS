<?php
mysql_query('UPDATE users SET store_alert = \'1\' WHERE id = \''.$_SESSION['user']['id'].'\'');
echo '<html><head><script>window.location = \'{url}/me\';</script><title>Stopping alerts...</title></head><body style="background:F0F0F0;"><center>Stopping the alert...</center></background></body></html>';
?>