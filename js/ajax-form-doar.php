<?php
include dirname(dirname(__FILE__)).'/mail.php';
error_reporting (E_ALL ^ E_NOTICE);
$post = (!empty($_POST)) ? true : false;

if($post)
{
$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
switch($_POST['assunto']){
case 'd':
    $subject = 'Quero doar dinheiro';
break;
case 'c':
    $subject = 'Quero ser contribuinte';
break;
case 'o':
    $subject = 'Outros assuntos';
break;
default:
    // Something went wrong or form has been tampered.
} 
// $subject = 'Mensagem do site AAEB';
$message = stripslashes($_POST['message']);
$message .= "<br />";
$message .= "<br />";
$message .= $name; 
$message .= "<br />";
$message .= $email;
$message .= "<br />";
$message .= "<br />";
$message .= "<b>Esse email foi enviado através do site da AAEB (popup).</b>";

$to = 'aaeb.sp01@gmail.com';
//$to = 'coordenadora@aaeb.org.br';
$from = CONTACT_FORM;

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: ".$name." <".$email.">\r\n"; // remetente
$headers .= "Return-Path: ".$from."\r\n"; // return-path

$mail = mail($to, $subject, $message, $headers);

}
?>

