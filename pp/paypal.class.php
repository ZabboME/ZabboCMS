
<?php
class paypal_class {
    
   var $last_error;                
   
   var $ipn_log;                   
   
   var $ipn_log_file;               
   var $ipn_response;                 
   var $ipn_data = array();         
   
   var $fields = array();           

   
   function paypal_class() {
       
    
      
      $this->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
      
      $this->last_error = '';
      
      //$this->ipn_log_file = '22.log';
      $this->ipn_log = true; 
      $this->ipn_response = '';
      

      $this->add_field('rm','2');           
      $this->add_field('cmd','_xclick'); 
      
   }
   
   function add_field($field, $value) {
      

            
      $this->fields["$field"] = $value;
   }

   function submit_paypal_post() {
 

     echo "<html>\n";
     echo "<head><title>Processing Payment...</title>";
     echo "<body onLoad=\"document.forms['paypal_form'].submit();\">\n";
     echo "<center><h2>Please wait, your order is being processed and you";
     echo " will be redirected to the paypal website.</h2></center>\n";
     echo "<form method=\"post\" name=\"paypal_form\" ";
     echo "action=\"".$this->paypal_url."\">\n";

     foreach ($this->fields as $name => $value) 
	 {
		 echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
      }
     echo "<center><br/><br/>If you are not automatically redirected to ";
     echo "paypal within 5 seconds...<br/><br/>\n";
     echo "<input type=\"submit\" value=\"Click Here\"></center>\n";
     echo "</body></html>\n";
    
   }
   
   function validate_ipn() {

 
      $url_parsed=parse_url($this->paypal_url);        

 
      $post_string = '';    
      foreach ($_POST as $field=>$value) { 
         $this->ipn_data["$field"] = $value;
         $post_string .= $field.'='.urlencode(stripslashes($value)).'&'; 
      }
      $post_string.="cmd=_notify-validate"; 

      
      $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30); 
      if(!$fp) {
        
         $this->last_error = "fsockopen error no. $errnum: $errstr";
         $this->log_ipn_results(false);       
         return false;
         
      } else { 
 
         
         fputs($fp, "POST $url_parsed[path] HTTP/1.1\r\n"); 
         fputs($fp, "Host: $url_parsed[host]\r\n"); 
         fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n"); 
         fputs($fp, "Content-length: ".strlen($post_string)."\r\n"); 
         fputs($fp, "Connection: close\r\n\r\n"); 
         fputs($fp, $post_string . "\r\n\r\n"); 

         
         while(!feof($fp)) { 
            $this->ipn_response .= fgets($fp, 1024); 
         } 

         fclose($fp);

      }
      
      if (eregi("VERIFIED",$this->ipn_response)) {
  
         $this->log_ipn_results(true);
         return true;       
         
      } else {
  
        
         $this->last_error = 'IPN Validation Failed.';
         $this->log_ipn_results(false);   
         return false;
         
      }
      
   }
   
   function log_ipn_results($success) {
       
      if (!$this->ipn_log) return;  // is logging turned off?
      
      
      $text = '['.date('m/d/Y g:i A').'] - '; 
      
      if ($success) $text .= "SUCCESS!\n";
      else $text .= 'FAIL: '.$this->last_error."\n";
      
      
      $text .= "IPN POST Vars from Paypal:\n";
      foreach ($this->ipn_data as $key=>$value) {
         $text .= "$key=$value, ";
      }
 
      
      $text .= "\nIPN Response from Paypal Server:\n ".$this->ipn_response;
      
      
      $fp=fopen($this->ipn_log_file,'a');
      fwrite($fp, $text . "\n\n"); 

      fclose($fp); 
   }

   function dump_fields() {
 

      
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


 
