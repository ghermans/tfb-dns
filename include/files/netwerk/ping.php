<?php
define("CHECK_DOMEIN","check_domein");
define("CHECK_IP","check_ip");

function formPING() {
	# definieer de vars die worden gebruikt
	global $error, $HTTP_POST_VARS;
       if (isset($_POST['status']))
  {
    $status = $_POST['status'];
	 $valueServer = trim($_POST['host']);
	 $self   = $_SERVER['PHP_SELF'];

	}	   
	?>
		   <div class="well well-small">
          <h3>Ping tool</h3>
       </div>

       <form method="post" action="" class="form-horizontal">
       <input type="hidden" name="status" value="ping">
	      
	   <div class="control-group">
      <label class="control-label" for="name">IP adres</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="host" id="host" required>
        <span class="help-block">
        <p class="text-error"> <?php	generateError($error, 'server', 'Geen geldige server opgegeven !!<br>'); ?></p>
        </span>
      </div>
        </div>
        
        	   <div class="control-group">
      <label class="control-label" for="name">&nbsp;</label>
      <div class="controls">
      <button type="submit" class="btn btn"><i class="icon-ok"></i> Controleren</button>
          <button type="reset" class="btn btn"><i class="icon-remove"></i> Alles leegmaken</button>
          
      </div>
        </div>
                				
        </form>
        <br>
        <?php
        }
       
        
        
function verwerkingFormPING(){
	# de variablen
	global $error, $HTTP_POST_VARS, $printAgain;

	$valueServer = trim($_POST['host']);

	# controleer de variablen op juistheid
   # de server die is opgegeven, kan een naam zijn, maar ook een IP
	if (! (checkField($valueServer, CHECK_IP) || (checkField($valueServer, CHECK_DOMEIN)))){
		$error['server'] = true;
		$printAgain = true;
	}

   if (strpos($valueServer, "192.168.1.")!==FALSE)
{   $error['server'] = true;
    $printAgain = true;
}
   
   
   if ($printAgain === true){
		formPING();
	}

else {
		
		# verwerk het formulier en geef de opgevraagde records weer
		formPING();
	    echo '<pre>';
	    system ("ping -c15  $valueServer");
        echo '</pre>';

		echo "</pre>\n";

	}
  } 
        
        
       
if (isset($_POST['status']) && $_POST['status'] == "ping"){
	verwerkingFormPING();
}else{
	formPING();
}
?>
</div>
