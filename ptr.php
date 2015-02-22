<?php
define("CHECK_DOMEIN","check_domein");
define("CHECK_IP","check_ip");

function formRDNS() {
	# definieer de vars die worden gebruikt
	global $error, $HTTP_POST_VARS;
       if (isset($_POST['status']))
  {
    $status = $_POST['status'];
	 $host   = $_POST['host'];
	 $self   = $_SERVER['PHP_SELF'];

	}	   
	?>
	 <div class="page-header">
          <h2>Reverse DNS</h2>
       </div>

       <form method="post" role="form" action="" class="form-horizontal">
       <input type="hidden" name="status" value="digging">
	      
      <div class="form-group">
      <label class="control-label" for="name">IP adres</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="host" id="host" required>
       <span class="help-block">
        <p class="text-error"> <?php	generateError($error, 'server', 'Dit is een ongeldig ip adres!<br>'); ?></p>
        </span>
      </div>
        </div>
        
          <div class="form-group">
      <label class="control-label" for="name">&nbsp;</label>
      <div class="controls">
      <button type="submit" class="btn btn"><i class="icon-ok"></i> Controleren</button>
          <button type="reset" class="btn btn"><i class="icon-remove"></i> Alles leegmaken</button>
          
      </div>
        </div>
            
<br>       

        </form>
        <?php
        }
  
        
        function verwerkingFormRDNS(){
	# de variablen
	global $error, $HTTP_POST_VARS, $printAgain;
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
		formRDNS();
	}else{
		# verwerk het formulier en geef de opgevraagde records weer
		formRDNS();
	    echo '<pre>';
	    system ("dig -x  $valueServer");
        echo '</pre>';

		echo "</pre>\n";

	}
  } 
  }  
        

if (isset($_POST['status']) && $_POST['status'] == "digging"){
	verwerkingFormRDNS();
}else{
	formRDNS();
}
?>

