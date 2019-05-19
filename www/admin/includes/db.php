<?php
	$con = mysqli_connect("192.168.99.100:3306","root","root","db_rush");
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
