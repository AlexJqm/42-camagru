<?php
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	$request_uri = explode('=', $request_uri[1], 2);
	if ($request_uri[0] == NULL)
		require 'view/home.php';
	else
		switch ($request_uri[0]) {
			case 'account':
				require 'view/account.php';
				break;
			case 'header':
				require 'view/header.php';
				break;
			case 'logout':
				require 'view/logout.php';
				break;
			case 'profile':
				require 'view/profile.php';
				break;
			case 'register':
				require 'view/register.php';
				break;
			case 'search':
				require 'view/search.php';
				break;
			case 'login':
				require 'view/signin.php';
				break;
			case 'followers':
				require 'view/followers.php';
				break;
			default:
				require 'view/404.php';
				break;
	}
?>
