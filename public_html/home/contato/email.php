<?php

$msg = array($name, $email, $message);
	$name = 'name';
	$email = 'email';
	$message = 'message';
		 
$mailheaders = "$REMOTE_ADDR\n";

mail($to, $subject, join("\n", $msg), $mailheaders);
Header( "Location: obrigado.html ");

?> 
