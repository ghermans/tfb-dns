<?php
 require 'include/libs/class.phpmailer.php';
function formSMTP(){
	# definieer de vars die worden gebruikt
	global $error, $HTTP_POST_VARS;
	if (isset($_POST['hiddenFormVerzonden'])){
		$to = trim($_POST['email']);
		$smtpuser = $_POST['login'];
		$smtppass = $_POST['wachtwoord'];
 }
// content komt hier

}?>

<div class="page-header">
  <h2>SMTP test mail</h2>
</div>

<fieldset id="login">
<form action="" method="post" role="form" class="form-horizontal">
       <div class="form-group">
        <label class="col-lg-2 control-label" for="email">Ontvanger</label>
        <div class="col-lg-4">
              <input type="email" class="form-control" name="email" id="email" required>
               </div>
          </div>

       <div class="form-group">
      <label class="col-lg-2 control-label" for="login">Afzender</label>
      <div class="col-lg-4">
        <input type="text" minlength="3" class="form-control" name="login" id="login" required>
      </div>
    </div>

         <div class="form-group">
      <label class="col-lg-2 control-label" for="wachtwoord">Wachtwoord</label>
      <div class="col-lg-4">
        <input type="password" class="form-control" name="wachtwoord" id="wachtwoord" required>
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
    </fieldset>
    <br />
<?php
	if (isset($_POST['hiddenFormVerzonden'])){
		$to = trim($_POST['email']);
		$smtpuser = $_POST['login'];
		$smtppass = $_POST['wachtwoord'];

// $body             = file_get_contents('hallo.html');
$body             = eregi_replace("[\]",'',$body);

$mail             = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "tls";
$mail->Host       = "smtp.telenet.be";
$mail->Port       = 587;
$mail->Username   = $smtpuser;
$mail->Password   = $smtppass;
$mail->SetFrom($smtpuser);
// $mail->AddCC($smtpuser);
// $mail->AddAttachment("/var/www/html/portal_new/modules/dns/include/files/mail/temp.zip");

$mail->Subject    = "Test mail met authenticated smtp";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->Body = '
Geachte, <br>
<br>
U kan zonder problemen e-mails versturen via uw Telenet e-mailadres.<br>
<br>
Heb je nog vragen over e-mailen of surfen?   <br>
- Raadpleeg en beheer je e-mail- en internetinstellingen in <a href="http://www.telenet.be/mijntelenet">www.telenet.be/mijntelenet</a>.<br>
<br>
 Je kunt er o.a.<br>
... een extra e-mailadres of mailbox aanmaken<br>
... je internetverbruik controleren via de Telemeter<br>
<br>
- Zoek het antwoord op je vragen over Telenet Internet op <a href="http://www.telenet.be/onlinesupport">www.telenet.be/onlinesupport</a>.<br>
Heb je toch nog een vraag? Dan kun je ook contact met ons opnemen via <a href="http://www.telenet.be/contact">www.telenet.be/contact</a> .<br>
<br>
Nog veel e-mailplezier gewenst,<br>
Het Telenet-team ';
$to;
$mail->AddAddress($to);

if(!$mail->Send()) {
  echo '<div class="alert-block alert-danger">';
  echo "Mailer Error: " . $mail->ErrorInfo;
  echo '</div>';

} else {
  echo '<div class="alert-block alert-success">
  De test mail is correct verzonden <br>
 </div>';
}
}
?>

