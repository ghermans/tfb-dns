<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'include/libs/class.phpmailer.php';

try {
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	$mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
	$mail->Port       = 587;
	$mail->Host       = "smtp.telenet.be";
	$mail->Username   = "example@telenet.be";
	$mail->Password   = "";
	$mail->From       = "example@telenet.be";
	$to = "hallo@telenet.be";
	$mail->AddAddress($to);

    $mail->IsSendmail();

	$mail->Subject  = "test Message";

	$mail->Body    = "SMTP test:ok";
	$mail->WordWrap   = 80;

	// $mail->MsgHTML($body);

	$mail->IsHTML(true); 

	$mail->Send();
	echo 'Message has been sent.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>
