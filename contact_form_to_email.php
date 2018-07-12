<?php

	if (!isset($_POST['SUBMIT']))
	{
		//if form not submitted
		echo "error: form not submitted";
	}

	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$message = $_POST['message'];

	//check if necessary values have been entered
	if (empty($name) || empty($contact) || empty($message))
	{
		echo "Name, contact information and message mandatory";
		exit;
	}

	if (isInjected($contact) || isInjected($name) || isInjected($message))
	{
			echo "Potentially dangerous content values";
			exit;
	}


	$email_from = 'juliebelleville0@gmail.com';
	$email_subject = "Form from Personal Website";
	$email_body = "New message from: $name. Contact info: $contact. \n Message: \n $message"

	$email_to = 'julie.belleville@telus.net';
	$headers = "From: $email_from";

	//send email
	mail($email_to, $email_subject, $email_body, $headers);

	//redirect to: "form entered"
	header('Location: submitted.html');

	function IsInjected($str)
	{
 		 $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
	 	 $inject = join('|', $injections);
	 	 $inject = "/$inject/i";
	  	if(preg_match($inject,$str))
	    {
	    	return true;
	  	}
	  	else
	    {
	    	return false;
	  	}
	}
   
?> 
































?>