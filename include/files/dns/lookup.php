<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define("CHECK_DOMEIN","check_domein");
define("CHECK_IP","check_ip");

include 'dnstypes.class.php';

function verwerkingFormDNS(){
	# de variablen
	global $error, $HTTP_POST_VARS, $printAgain;

	$valueDomein = trim($_POST['host']);
	$valueType = $_POST['selType'];

	# controleer de variablen op juistheid
	# het domein moet bestaan uit een text met een format xxx.xxx op het einde
		# verwerk het formulier en geef de opgevraagde records weer
	  //	formDNS();
      echo "<div class=\"page-header\"><h2>	$valueDomein </h2></div>";
	    echo '<pre>';
	    system ("dig $valueDomein $valueType");
        echo '</pre>';

		echo "</pre>\n";

}
       function formDNS(){
	# definieer de vars die worden gebruikt
	global $error, $HTTP_POST_VARS;
       if (isset($_POST['status']))
  {
		$valueDomein = trim($_POST['host']);
		$valueType = $_POST['selType'];

	}
	?>

		   <div class="page-header">
          <h2>DNS lookup</h2>
          </div>

       <form id="dnslookup" role="form" action="" method="post" class="form-horizontal">

       <div class="form-group">
      <label class="col-lg-2 control-label" for="name">Domeinnaam</label>
  <div class="col-lg-4">
        <input type="text" class="form-control" name="host" id="host" required>
               <span class="help-block">
        <p class="text-error"> <?php  //	generateError($error, 'domein', 'Dit is geen geldig domein !<br>'); ?></p>
        </span>
      </div>
    </div>

         <div class="form-group">
      <label class="col-lg-2 control-label" for="selType">Type</label>
      <div class="col-lg-4">
                 	<select name="selType" id="selType" class="form-control" required>
						<?php
						$oRecordTypes = new DNSTypes();
						$aRecordTypes = $oRecordTypes->typesByID;

						if (count($aRecordTypes) != 0){
							foreach ($aRecordTypes as $sRecordType){

									$selectedType = "";

								echo "<option value=\"".$sRecordType."\"".$selectedType.">".$sRecordType."</option>\n";
							}
						}
						?>
					</select>
					 <span class="help-block">
        <p class="text-error"> <?php //	generateError($error, 'type', 'Geen geldig recordtype opgegeven !!<br>');?></p>
        </span>
      </div>
    </div>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="actions">
            <input type="hidden" name="status" value="digging">
            </label>
      <div class="controls">
	       <button type="submit" class="btn btn"><i class="icon-ok"></i> Controleren</button>
          <button type="reset" class="btn btn"><i class="icon-remove"></i> Alles leegmaken</button>
	      </div>
          </div>
          <br>
         	
        </form>
        <?php
        }
        ?>

        <?php
if (isset($_POST['status']) && $_POST['status'] == "digging"){
	verwerkingFormDNS();
}else{
	formDNS();
}
?>
