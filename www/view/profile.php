<div class="container">
<?php
	require 'function/follower.php';

	if (isset($_GET['profile'])) {
		$profile_user = $_GET['profile'];
		$profile_run  = $db_con->query("SELECT COUNT(*) FROM customers WHERE customer_user = '$profile_user'");
		if ($profile_run->fetchColumn() == 0)
			exit ("<script>window.open('index.php?404','_self')</script>");
		$profile_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$profile_user'");
		while ($profile_row = $profile_run->fetch()) {
			$customer_email = $profile_row['customer_email'];
			$customer_ln = $profile_row['customer_ln'];
			$customer_fn = $profile_row['customer_fn'];
			$customer_img = $profile_row['customer_img'];
			$customer_bio = $profile_row['customer_bio'];
		?>
		<div class="jumbotron jumbotron-fluid bg-dark text-light rounded">
			<div class="container">
				<ul class="list-inline">
					<li class="list-inline-item"><h1 class="display-4"><?php echo $profile_user ?></h1></li>
					<li class="list-inline-item"><h3><?php echo $customer_ln . ' ' . $customer_fn ?></h3></li>
				</ul>
				<p class="lead"><?php echo $customer_bio ?></p>
				<p><small><?php echo print_follow($profile_user)[0] ?> followers | Membre depuis Mars 2019</small></p>
				<?php
					$follow_run = $db_con->query("SELECT COUNT(*) FROM followers WHERE customer_user = '$_SESSION[customer_user]' AND follower_user = '$profile_user' AND follower_bool = '1'");
					if (!$follow_run->fetchColumn())
						echo '<a href="index.php?profile=' . $profile_user . '&action=follow"><button class="btn btn-sm btn-warning">Follow</button></a>';
					else
						echo '<a href="index.php?profile=' . $profile_user . '&action=unfollow"><button class="btn btn-sm btn-warning">Unfollow</button></a>'
				?>
				<button class="btn btn-sm btn-light">Contacter</button>
				<img src="public/images/profile_picture/<?php echo $customer_img ?>"
					class="rounded-circle float-right border border-warning"
					style="width: 120px; height: 120px; margin-top: 15px; border-width:3px !important;"
					alt="Image de profil">
			</div>
		</div>
		<?php
		}
		if (isset($_GET['profile']) && $_GET['action'] == 'follow') {
			follow($_SESSION['customer_user'], $profile_user);
			exit ("<script>window.open('index.php?profile=$profile_user','_self')</script>");
		} if (isset($_GET['profile']) && $_GET['action'] == 'unfollow') {
			unfollow($_SESSION['customer_user'], $profile_user);
			exit ("<script>window.open('index.php?profile=$profile_user','_self')</script>");
		}
	}
?>
</div>

<?php
	require 'view/profile_content.php';
?>
