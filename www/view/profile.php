<div class="container">
<?php
	require_once('function/connect.php');
	require_once('function/follower.php');
	require_once('function/comment.php');
	require_once('function/auth.php');

	$db_con = db_con();

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
					$follow_run = $db_con->query("SELECT COUNT(*) FROM followers WHERE customer_user = '$_SESSION[user]' AND follower_user = '$profile_user' AND follower_bool = '1'");
					if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
						if (!$follow_run->fetchColumn())
							echo '<a href="index.php?profile=' . $profile_user . '&action=follow"><button class="btn btn-sm btn-warning">Follow</button></a>';
						else
							echo '<a href="index.php?profile=' . $profile_user . '&action=unfollow"><button class="btn btn-sm btn-warning">Unfollow</button></a>';
					}
					else
						echo '<a href="index.php?signin"><button class="btn btn-sm btn-warning">Follow</button></a>';
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
		if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
			if (isset($_GET['profile']) && $_GET['action'] == 'follow') {
				follow($_SESSION['user'], $profile_user);
				exit ("<script>window.open('index.php?profile=$profile_user','_self')</script>");
			} if (isset($_GET['profile']) && $_GET['action'] == 'unfollow') {
				unfollow($_SESSION['user'], $profile_user);
				exit ("<script>window.open('index.php?profile=$profile_user','_self')</script>");
			}
		}
	}
?>
</div>
<div class="container">
<?php
	require_once('function/like.php');

	if (isset($_GET['profile'])) {
		$profile_user = $_GET['profile'];
		$picture_run = $db_con->query("SELECT * FROM pictures WHERE picture_author = '$profile_user' ORDER BY picture_id DESC");
		while ($picture_row = $picture_run->fetch()) {
			$picture_id = $picture_row['picture_id'];
			$picture_name = $picture_row['picture_name'];
			$picture_source = $picture_row['picture_source'];
			$picture_date = $picture_row['picture_date'];
			$picture_like = $picture_row['picture_like'];
			$picture_desc = $picture_row['picture_desc'];
			$picture_comment = $picture_row['picture_comment'];
			$picture_filter = $picture_row['picture_filter'];
?>
	<div class="card-group mb-3" style="width: 975px; height: auto;">
		<div class="card text-light bg-dark">
			<img src="public/images/post_picture/<?php echo $picture_source ?>" class="card-img-top filter-<?php echo $picture_filter ?>" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $picture_name ?></h5>
				<p class="card-text"><?php echo $picture_desc ?></p>
				<p class="card-text float-right"><small class="text-muted"><?php echo $picture_date ?></small></p>
			</div>
			<div class="card-footer">
				<?php
					$like_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE customer_user = '$_SESSION[user]'
												AND like_user = '$profile_user' AND like_bool = '1' AND picture_id = '$picture_id'");
					if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
						if (!$like_run->fetchColumn())
							echo '<a href="index.php?profile=' . $profile_user . '&action=like' . $picture_id . '"><i class="far fa-heart text-secondary"></i></a> ';
						else
							echo '<a href="index.php?profile=' . $profile_user . '&action=unlike' . $picture_id . '"><i class="fas fa-heart text-danger"></i></a> ';
					}
					else
						echo '<i class="far fa-heart text-light"></i> ';
				echo print_like($profile_user, $picture_id)[0];
				?> Likes
				<a href="index.php?content=<?php echo $picture_id ?>"><p class="float-right text-light"><i class="far fa-comment"></i> <?php echo comment_count($picture_id); ?> Commentaires</p></a>
				<span class="float-right mr-2" onclick="window.open('view/share.php?content=<?php echo $picture_id ?>&user=<?php echo $_SESSION['user'] ?>','Patarger','resizable,height=260,width=370');" target="_blank" style="cursor: pointer;"><i class="fas fa-share text-light"></i> Partager</span>
			</div>
		</div>
	</div>
<?php
			if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
				if (isset($_GET['profile']) && $_GET['action'] == "like$picture_id") {
					like($_SESSION['user'], $profile_user, $picture_id);
					exit ("<script>window.open('index.php?profile=$profile_user','_self')</script>");
				} if (isset($_GET['profile']) && $_GET['action'] == "unlike$picture_id") {
					unlike($_SESSION['user'], $profile_user, $picture_id);
					exit ("<script>window.open('index.php?profile=$profile_user','_self')</script>");
				}
			}
		}
	}
?>
</div>
