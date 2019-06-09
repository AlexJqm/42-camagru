<?php
	if (isset($_GET['login']))
		require ("views/signin.php");
	if (isset($_GET['register']))
		require ("views/register.php");
	if (isset($_GET['profil']))
		require ("views/profile.php");
	if (isset($_GET['account']))
		require ("views/account.php");
	if (isset($_GET['logout']))
		require ("views/logout.php");
	if (isset($_GET['search']))
		require	("views/search.php");
	if (isset($_GET['404']))
		require	("views/404.php");
?>
