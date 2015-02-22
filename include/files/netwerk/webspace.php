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
          <h2>Webruimte controleren</h2>
       </div>

       <form method="post" role="form" action="" class="form-horizontal">
       <input type="hidden" name="status" value="digging">

<div class="form-group">
     <label class="col-lg-2 control-label" for="name">Zoeken op</label>
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input name="zoekop"  type="radio"> internet login
        </label>
      </div>

       <div class="checkbox">
        <label>
          <input name="zoekop" type="radio"> url
        </label>
      </div>


    </div>
  </div>

	   <div class="cform-group">
      <label class="col-lg-2 control-label" for="name">&nbsp;</label>
    <div class="col-lg-4">
            <input type="text" class="form-control" name="host" id="host" required>
       <span class="help-block">
        <p class="text-error"> <?php generateError($error, 'server', 'Dit is een ongeldig ip adres!<br>'); ?></p>
        </span>
      </div>
        </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="controls">
      <button type="submit" class="btn btn"><i class="icon-ok"></i> Controleren</button>
          <button type="reset" class="btn btn-danger"><i class="icon-remove"></i> Alles leegmaken</button>

      </div>
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
//	if (! (checkField($valueServer, CHECK_DOMEIN))){
//		$error['server'] = true;
//		$printAgain = true;
//	}

       	if ($printAgain === true){
		formRDNS();
	}else{
		# verwerk het formulier en geef de opgevraagde records weer
//		formRDNS();
?>
<div class="page-header">
<?php echo "<h2>".$valueServer."</h2>"; ?>
</div>
<div class="row">
<div class="alert alert-block alert-danger fade in">
        <h4><i class="icon-remove"></i> DNS record!</h4>
        <p>Het A record voor tfb-customerservice.be is niet correct ingesteld, wijzig het ip in smart.</p>
      </div>
</div>

<div class="row">
<div class="panel panel-danger">

  <div class="panel-heading">
    <h3 class="panel-title alert-danger"> <i class="icon-remove  large"></i> DNS gegevens</h3>
  </div>
  <div class="panel-body">
<ul class="list-group">
    <li class="list-group-item alert-danger">tfb-customerservice.be A  192.168.1.1</li>
    <li class="list-group-item alert-success">tfb-customerservice.be NS ns.be.hostbasket.com</li>
    <li class="list-group-item alert-success">tfb-customerservice.be NS ns.nl.hostbasket.com</li>

  </ul>
  </div>
</div>
</div>
<div class="row">

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title alert-success"><i class="icon-ok  large"></i> LDAP&nbsp;gegevens</h3>
  </div>
  <div class="panel-body">
                            <p><b>FTP login:</b>&nbsp;t4568<br>
                            <b>Hoofdmap</b>&nbsp;/var/wwwroot/t4568</p>
  </div>
</div>

  </div>



<?php
	}
  }
  }


if (isset($_POST['status']) && $_POST['status'] == "digging"){
	verwerkingFormRDNS();
}else{
	formRDNS();
}
?>

