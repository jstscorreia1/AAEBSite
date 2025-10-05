<?php
echo 'entrei ';

include dirname(dirname(__FILE__)).'/mail.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{
$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$subject = 'Mensagem de rodape';
$message = stripslashes($_POST['message']);

$error = '';
 
if(!$error)
{
echo '**** vou mandar email ';
echo nl2br("$name ". "\r\n");
echo nl2br("$email". "\r\n");
echo nl2br("$message". "\r\n");
$email = "adm@aaeb.netne.net";
$message .= "<br />";
$message .= "<br />";
$message .= $name; 
$message .= "<br />";
$message .= $email;
$message .= "<br />";
$message .= "<br />";
$message .= "<b>Esse email foi enviado através do site da AAEB (rodapé).</b>";

//echo nl2br("$message". "\r\n");

$from = CONTACT_FORM;
echo nl2br("$from". "\r\n");

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: ".$name." <".$email.">\r\n"; // remetente
$headers .= "Return-Path: ".$from."\r\n"; // return-path

echo nl2br("$headers". "\r\n"); 

//$mail = mail("abresp@yahoo.com.br", $subject, $message, $headers);
//$mail = mail("atendimento@abre-excedente.org.br", $subject, $message, $headers);
$mail = mail(CONTACT_FORM, $subject, $message, $headers);
// 

//$mail = mail("abresp@yahoo.com.br", $subject, $message,
//     "From: ".$name." <".$email.">\r\n"
//    ."Reply-To: ".$email."\r\n"
//    ."X-Mailer: PHP/" . phpversion());


if($mail)
{
echo 'OK';
}

}
else
{
echo '<div class="notification_error">'.$error.'</div>';
}

}

//echo 'sai';
?>

