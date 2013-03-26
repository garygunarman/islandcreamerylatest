<?php 
include("../static/connect_database.php");
include("../static/get_info.php");

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

if ($_POST["subject"]!=null) {
	$subject = $_POST["subject"]; }
	else {
		$subject = "Email from customer"; }

$email_message = "-----Sender Information-----\n";
$email_message .= "Name: $name\n";
$email_message .= "E-mail : $email\n";
$email_message .= "Message:\n";
$email_message .= "$message\n";
$email_message .= "\n";
$email_message .= "Sent from the website ".$info["url"];
$to = $info["email"];
$headers = "From: ".$email;
$sent_success=mail($to,$subject,$email_message,$headers);

if ($sent_success==true){
	header("location:../contact?success=1"); }
else{
	header("location:../contact"); }
?>