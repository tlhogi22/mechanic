<?php
/*
A new registration 
A new log
*/
function newRequest($email,$name){
	$to = $email;
	$subj = "New request";
	$body =  "Hi ".$name."<br><br>";
	$body .= "A Client requested your assistance, please attend to them ASAP.";
	$body .= "<br><br>";
	$body .= "Regards";
	$body .= "Mechanic Locator";	
	
	send_email($to,$subj,$body);
}

function newTechnician($email,$name){
	$to = $email;
	$subj = "Registration successful";
	$body =  "Hi ".$name."<br><br>";
	$body .= "Your have been successfully registered on the online call log app.";
	$body .= "<br><br>";
	$body .= "Regards";
	$body .= "JSM Team";	
	
	send_email($to,$subj,$body);
}

function newLog($email,$name){
	$to = $email;
	$subj = "Log created";
	$body =  "Hi ".$name."<br><br>";
	$body .= "Your call log has been successfully placed.";
	$body .= "<br><br>";
	$body .= "Regards";
	$body .= "JSM Team";	
	
	send_email($to,$subj,$body);
}

function logAcceptance($email,$name){
	$to = $email;
	$subj = "Call accepted";
	$body =  "Hi ".$name."<br><br>";
	$body .= "Your call request is being attended to.";
	$body .= "<br><br>";
	$body .= "Regards";
	$body .= "JSM Team";	
	
	send_email($to,$subj,$body);	
}

function logComplete($email,$name){
	$to = $email;
	$subj = "Call closed";
	$body =  "Hi ".$name."<br><br>";
	$body .= "Your call has been closed.";
	$body .= "<br><br>";
	$body .= "Regards";
	$body .= "JSM Team";
	
	send_email($to,$subj,$body);	
}

function send_email($to,$subject,$msg_Body){	
	
	$from = "testcoding0@gmail.com";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: Admin <'.$from.'>' . "\r\n";
	
	mail($to,$subject,$msg_Body,$headers);
}
?>
