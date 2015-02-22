<?php
define("CHECK_DOMEIN","check_domein");
define("CHECK_IP","check_ip");

function formDNSBL() {
	# definieer de vars die worden gebruikt
	global $error, $HTTP_POST_VARS;
       if (isset($_POST['status']))
  {
    $status = $_POST['status'];
	 $host   = $_POST['host'];
	 $valueServer = trim($_POST['host']);
	 $ip = $_POST['host'];
	 $self   = $_SERVER['PHP_SELF'];

	}	   
	?>
	<div class="page-header">
          <h2>DNS Blacklist</h2>
       </div>

       <form method="post" role="form" action="" class="form-horizontal">
       <input type="hidden" name="status" value="dnsbl">
	      
	   <div class="form-group">
      <label class="col-lg-2 control-label" for="name">Ip adres</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" name="host" id="host" required>
       <span class="help-block">
        <p class="text-error"> <?php	generateError($error, 'server', 'Dit is een ongeldige ip adres!<br>'); ?></p>
        </span>
      </div>
        </div>
        

<div class="form-group">

          <label class="col-lg-2 control-label" for="actions">
            
            </label>
      <div class="controls">
	       <button name="hiddenFormVerzonden" type="submit" class="btn btn"><i class="icon-ok"></i> Controleren</button>
               <button type="reset" class="btn btn"><i class="icon-remove"></i> Alles leegmaken</button>
	      </div>

          </div>
            
<br>       

        </form>
        <?php
        }
  
        
        function verwerkingFormDNSBL($ip){
	# de variablen
	global $error, $HTTP_POST_VARS, $printAgain;
	$ip = $_POST['host'];
 if (isset($_POST['status']))
  {
	$valueServer = trim($_POST['host']);

	# controleer de variablen op juistheid
   # de server die is opgegeven, kan een naam zijn, maar ook een IP
	if (! (checkField($valueServer, CHECK_IP))){
		$error['server'] = true;
		$printAgain = true;
	}

       	if ($printAgain === true){
		formDNSBL();
	}else{
		# verwerk het formulier en geef de opgevraagde records weer
		formDNSBL();
	   $ip = $_POST['host'];
$dnsbl_lookup=array("ips.backscatterer.org","dnsbl.sorbs.net","zen.spamhaus.org");
if($ip){
$reverse_ip=implode(".",array_reverse(explode(".",$ip)));
foreach($dnsbl_lookup as $host){
if(checkdnsrr($reverse_ip.".".$host.".","A")){
$listed.= "<tr>
           <td>$reverse_ip</td>
           <td>$host</td>
           </tr>";

}
}
}
if($listed){
echo '
<pre>
<p class="text-error">Het ip is geblokkeerd </font></p>
<p class="text-error">Hieronder vind je de blacklist provider waar het ip adres geblokkeerd is. </p>
<table class="table table-bordered">
<tr>
<th>Geblokkeerd ip</th>
<th>Blacklist provider</th>
';

echo $listed;
echo "</table>
      </pre>";
}else{
echo ' <pre>
      <p class="text-success">Dit ip is niet geblokkeerd.</p>
	   </pre>';
}

	}
  }
  }
        

if (isset($_POST['status']) && $_POST['status'] == "dnsbl"){
	verwerkingFormDNSBL($ip);
}else{
	formDNSBL();
}
?>

