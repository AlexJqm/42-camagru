<?php
	session_start ();
	session_unset ();
	session_destroy ();
	exit ("<script>window.open('index.php','_self')</script>");
?>
