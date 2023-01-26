<?php
// $my_arr = array(1,2,3);
// echo '<script>';
// echo 'console.log('. json_encode($my_arr, JSON_HEX_TAG) .')';
// echo '</script>';

if(!$_POST) exit;



$email = $_POST['email'];

$errors=0;
$error="";

//$error[] = preg_match('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i', $_POST['email']) ? '' : 'INVALID EMAIL ADDRESS';
// if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email )){
if(!preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$/",$email )){
// if(!preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/",trim($email) )){
	$error.="Invalid email address entered";
	$errors=1;
	// echo '<script>';
	// echo 'console.log('. json_encode($error, JSON_HEX_TAG) .')';
	// echo '</script>';
}
if($errors==1) echo $error;
else{
	$values = array ('name','email','message');
	$required = array('name','email','message');
	 
	$your_email = "admin@newtopcorp.com";
	$email_subject = "NEWTOP CONTACT FORM INQUIRY ".$_POST['subject'];
	$email_content = "Message:\n";
	
	foreach($values as $key => $value){
	  if(in_array($value,$required)){
		if ($key != 'subject' && $key != 'company') {
		  if( empty($_POST[$value]) ) { echo 'PLEASE FILL IN REQUIRED FIELDS'; exit; }
		}
		$email_content .= $value.': '.$_POST[$value]."\n";
	  }
	}
	 
	if(@mail($your_email,$email_subject,$email_content)) {
		echo '<font style="color:#dd932a";>Your Message has been sent! Thank You for contacting us!</font>'; 
	} else {
		echo '<font style="color:#dd932a";>Something wrong while sending your email!</font>';
	}
}
?>