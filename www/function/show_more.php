<?php
	$_SESSION['newsfeed'] += 1 ;
	exit ("<script>window.open('index.php?newsfeed#more','_self')</script>");
?>
