<?php
phpinfo();

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

phpAlert("Hello world!\\n\\nPHP has got an Alert Box");

echo "<script>alert('There are no fields to generate a report');</script>";
 
include dirname(dirname(__FILE__)).'/mail.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{
$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$subject = 'Mensagem do site AAEB';
$message = stripslashes($_POST['message']);
$message .= "<br />";
$message .= "<br />";
$message .= $name; 
$message .= "<br />";
$message .= $email;
$message .= "<br />";
$message .= "<br />";
$message .= "<b>Esse email foi enviado através do site da AAEB (rodapé).</b>";

//$to = 'aaeb.sp01@gmail.com';
$to = 'coordenadora@aaeb.org.br';
$from = CONTACT_FORM;

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: ".$name." <".$email.">\r\n"; // remetente
$headers .= "Return-Path: ".$from."\r\n"; // return-path

//$mail = mail("abresp@yahoo.com.br", $subject, $message, $headers);
//$mail = mail("atendimento@abre-excedente.org.br", $subject, $message, $headers);
$mail = mail($to, $subject, $message, $headers);

//$mail = mail("abresp@yahoo.com.br", $subject, $message,
//     "From: ".$name." <".$email.">\r\n"
//    ."Reply-To: ".$email."\r\n"
//    ."X-Mailer: PHP/" . phpversion());

}
?>

