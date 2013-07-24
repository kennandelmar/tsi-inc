<?php 
 $to = "antonio.cisneros9@gmail.com"; ; 
 $from = $_REQUEST['from'] ; 
 $subject = $_REQUEST['subject'] ; 
 $headers = "From: $from"; 
 //$subject = "Web Contact Data"; 
 
 $fields = array(); 
 $fields{"from"} = "from"; 
 $fields{"subject"} = "subject"; 
 $fields{"message"} = "message"; 
 
 $body = "We have received the following information:\n\n"; foreach($fields as $a => $b){ 	$body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); } 
 
 $headers2 = "From: noreply@trendsettahinc.com"; 
 $subject2 = "Thank you for contacting us"; 
 $autoreply = "Thank you for contacting us. Somebody will get back to you as soon as possible, usualy within 48 hours. If you have any more questions, please consult our website at www.trendsettahinc.com";
 
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

if(!preg_match($email_exp,$from)) {print "You have not entered a valid email address, please go back and try again";} 
else { 
	if($from == '') {print "You have not entered an email address, please go back and try again";} 
	else { 
		if($subject == '') {print "You have not entered a subject, please go back and try again";} 
		else { 
			if($message == '') {print "You have not entered your message, please go back and try again";} 
			else { 
				$send = mail($to, $subject, $body, $headers); 
				$send2 = mail($from, $subject2, $autoreply, $headers2); 
				if($send) {header( "Location: http://www.trendsettahinc.com/version2.0/thankyou.html#thankyou" );} 
				else {print "We encountered an error sending your mail, please notify webmaster@trendsettahinc.com"; }
				}
			}
		}
	}
?> 