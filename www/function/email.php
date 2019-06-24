<?php
	require_once('function/connect.php');

	function send_mail($customer_email, $customer_token) {
		$message = "http://192.168.99.100:8080/index.php?confirm_email=$customer_token&customer_email=$customer_email";
		$message = wordwrap($message, 70, "\r\n");
		mail($customer_email, 'Camagru - Confirmation d\'email', $message, "From: Camagru <sitename@hostname.com> \r\n");
		return (0);
	}

	function send_password($customer_email, $customer_token) {
		$message = "http://192.168.99.100:8080/index.php?new_password=$customer_token&customer_email=$customer_email";
		$message = wordwrap($message, 70, "\r\n");
		mail($customer_email, 'Camagru - Reinitialisation du mot de passe', $message, "From: Camagru <sitename@hostname.com> \r\n");
		return (0);
	}
?>
