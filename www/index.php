<?php
	session_start();
	include 'database/install.php';
	require 'functions/functions.php';
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
		<link rel="stylesheet" href="srcs/css/form_sign.css">

		<title>Camagru</title>
		<style>
			.container {
				animation: launch 1s;
				opacity: 1;
			}
			@keyframes launch {
				0% {opacity: 0;}
				100% {opacity: 1;}
			}
		</style>
	</head>
	<body class="text-secondary pb-5">
			<?php
				require 'views/header.php';
				require 'controllers/routers.php';
				require 'views/footer.php';
			?>

