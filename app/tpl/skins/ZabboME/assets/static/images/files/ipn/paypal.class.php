<?php

class paypal_class {

    

   var $last_error;                 // holds the last error encountered

   

   var $ipn_log;                    // bool: log IPN results to text file?

   

   var $ipn_log_file;               // filename of the IPN log

   var $ipn_response;               // holds the IPN response from paypal   

   var $ipn_data = array();         // array contains the POST values for IPN

   

   var $fields = array();           // array holds the fields to submit to paypal



   

   public function paypal_class() {

       

      // initialization constructor.  Called when class is created.

      

      $this->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';

      

      $this->last_error = '';

      

      $this->ipn_log_file = '.ipn_results.log';

      $this->ipn_log = true; 

      $this->ipn_response = '';

      

      // populate $fields array with a few default values.  See the paypal

      // documentation for a list of fields and their data types. These defaul

      // values can be overwritten by the calling script.



      $this->add_field('rm','2');           // Return method = POST

      $this->add_field('cmd','_xclick'); 

      

   }

   

   public function add_field($field, $value) {

      

      $this->fields["$field"] = $value;

   }



   public function submit_paypal_post() {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">     
   <head>
      <title>%hotel_name% ~ Be Patient</title>
      <link rel="shortcut icon" href="%www%/favicon.ico" type="image/vnd.microsoft.icon">
      <link rel="stylesheet" type="text/css" media="screen" href="%www%/files/css/wubbo.css" />
      <script type="text/javascript" src="%www%/files/js/wubbo.js"></script>
      <script type="text/javascript" src="%www%/files/js/main.js"></script>
   </head>
   <body>
      <div class="disconnected">
         <form method="post" name="paypal_form" action="<?php echo $this->paypal_url; ?>">
            <?php
               foreach ($this->fields as $name => $value) {
                    echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
               }  
            ?>
         </form>
         <div class="c-box-disconnected">
            <div class="c-title red">Be Patient</div>
            <div class="c-main-disconnected">
               <center>
                  <?php
                     echo '<img src="%www%/files/avatars/lg-3202-76-62.hr-115-36.fa-1201-0.ha-1006-62.hd-180-8&direction=3&head_direction=3&gesture=sml&action=.gif" height="110" width="64"><br><br>';
                  ?>
                  Wait as you are redirected to PayPal...<br><br>
                  <a href="%www%/tokens">Click here to go back to Wabbo!</a>
               </center>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         window.onload = document.forms["paypal_form"].submit();
      </script>   
   </body>
</html>

<?php

	die; 

   }

   

   public function validate_ipn() {



      $url_parsed=parse_url($this->paypal_url);        



 

      $post_string = '';    

      foreach ($_POST as $field=>$value) { 

         $this->ipn_data["$field"] = $value;

         $post_string .= $field.'='.urlencode(stripslashes($value)).'&'; 

      }

      $post_string.="cmd=_notify-validate"; // append ipn command



      $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30); 

      if(!$fp) {

          

         $this->last_error = "fsockopen error no. $errnum: $errstr";

         $this->log_ipn_results(false);       

         return false;

         

      } else { 

 

         // Post the data back to paypal

         fputs($fp, "POST $url_parsed[path] HTTP/1.1\r\n"); 

         fputs($fp, "Host: $url_parsed[host]\r\n"); 

         fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n"); 

         fputs($fp, "Content-length: ".strlen($post_string)."\r\n"); 

         fputs($fp, "Connection: close\r\n\r\n"); 

         fputs($fp, $post_string . "\r\n\r\n"); 



         while(!feof($fp)) { 

            $this->ipn_response .= fgets($fp, 1024); 

         } 



         fclose($fp); // close connection



      }

      

      if (eregi("VERIFIED",$this->ipn_response)) {

  

         // Valid IPN transaction.

         $this->log_ipn_results(true);

         return true;       

         

      } else {

  

         $this->last_error = 'IPN Validation Failed!';

         $this->log_ipn_results(false);   

         return false;

         

      }

      

   }

   

   public function log_ipn_results($success) {

       

      if (!$this->ipn_log) return;

      

      // Timestamp

      $text = '['.date('m/d/Y g:i A').'] - '; 

      

      // Success or failure being logged?

      if ($success) $text .= "SUCCESS!\n";

      else $text .= 'FAIL: '.$this->last_error."\n";

      

      // Log the POST variables

      $text .= "IPN POST Vars from Paypal:\n";

      foreach ($this->ipn_data as $key=>$value) {

         $text .= "$key=$value, ";

      }

 

      // Log the response from the paypal server

      $text .= "\nIPN Response from Paypal Server:\n ".$this->ipn_response;

      

      // Write to log

      $fp=fopen($this->ipn_log_file,'a');

      fwrite($fp, $text . "\n\n"); 



      fclose($fp);

   }



   public function dump_fields() {

 



      

      echo "<h3>paypal_class->dump_fields() Output:</h3>";

      echo "<table width=\"95%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\">

            <tr>

               <td bgcolor=\"black\"><b><font color=\"white\">Field Name</font></b></td>

               <td bgcolor=\"black\"><b><font color=\"white\">Value</font></b></td>

            </tr>"; 

      

      ksort($this->fields);

      foreach ($this->fields as $key => $value) {

         echo "<tr><td>$key</td><td>".urldecode($value)."&nbsp;</td></tr>";

      }

 

      echo "</table><br>"; 

   }

}         





 

