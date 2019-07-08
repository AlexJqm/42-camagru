<?php
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	$request_uri = explode('=', $request_uri[1], 2);
	if ($request_uri[0] == NULL)
		require 'view/home.php';
	else
		switch ($request_uri[0]) {
			case 'manage_profile':
				require 'view/manage_profile.php';
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
			case 'signin':
				require 'view/signin.php';
				break;
			case 'followers':
				require 'view/followers.php';
				break;
			case 'creation':
				require 'view/creation.php';
				break;
			case 'notification':
				require 'view/notification.php';
				break;
			case 'manage_content':
				require 'view/manage_content.php';
				break;
			case 'content':
				require 'view/content.php';
				break;
			case 'filter':
				require 'view/filter.php';
				break;
			case 'confirm_email':
				require 'view/confirm_email.php';
				break;
			case 'forget_password':
				require 'view/forget_password.php';
				break;
			case 'new_password':
				require 'view/new_password.php';
				break;
			case 'newsfeed':
				require 'view/newsfeed.php';
				break;
			case 'showmore':
				require 'function/show_more.php';
				break;
			default:
				require 'view/404.php';
				break;
	}
?>
