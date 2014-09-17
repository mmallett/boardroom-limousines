<?php

	/*
		REQUIRES
			pear
			pear mail

		INSTALL - on Ubuntu 14.04
			sudo apt-get install pear
			sudo pear install -a mail
	*/

	require_once "Mail.php";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	$from = 'noreply.boardroomlimos@gmail.com';
	$to = 'phpmailtest@mailinator.com';
	$subject = "[NOREPLY] New contact " . $name . " from landing page";
	$body = "Name: " . $name . "\nEmail: " . $email . "\nPhone: " . $phone;

	$headers = array(
	'From' => $from,
	'To' => $to,
	'Subject' => $subject
	);

	$smtp = Mail::factory('smtp', array(
	    'host' => 'ssl://smtp.gmail.com',
	    'port' => '465',
	    'auth' => true,
	    'username' => 'noreply.boardroomlimos@gmail.com',
	    'password' => 'BigJava3e'
	));

	$mail = $smtp->send($to, $headers, $body);

	if (PEAR::isError($mail)) {
		echo('There was a problem handling your request, please try again');
		http_response_code(500);		
	} else {
		echo('Message received, thanks!');
	}

?>