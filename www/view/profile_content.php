<div class="container">
<?php
	require 'function/like.php';

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
?>
	<div class="card-group mb-3" style="width: 975px; height: auto;">
		<div class="card">
			<img src="public/images/post_picture/<?php echo $picture_source ?>" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $picture_name ?></h5>
				<p class="card-text"><?php echo $picture_desc ?></p>
				<p class="card-text float-right"><small class="text-muted"><?php echo $picture_date ?></small></p>
			</div>
			<div class="card-footer">
				<?php
					$like_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE customer_user = '$_SESSION[customer_user]'
												AND like_user = '$profile_user' AND like_bool = '1' AND picture_id = '$picture_id'");
					if (!$like_run->fetchColumn())
						echo '<a href="index.php?profile=' . $profile_user . '&action=like' . $picture_id . '"><i class="far fa-heart text-secondary"></i></a>';
					else
						echo '<a href="index.php?profile=' . $profile_user . '&action=unlike' . $picture_id . '"><i class="fas fa-heart text-danger"></i></a>'
				?>
				<?php echo print_like($profile_user, $picture_id)[0] ?> Likes
				<p class="float-right"><i class="far fa-comment"></i> <?php echo $picture_comment ?> Commentaires</p>
			</div>
		</div>
	</div>
<?php
			if (isset($_GET['profile']) && $_GET['action'] == "like$picture_id") {
				like($_SESSION['customer_user'], $profile_user, $picture_id);
				exit ("<script>window.open('index.php?profile=$profile_user','_self')</script>");
			} if (isset($_GET['profile']) && $_GET['action'] == "unlike$picture_id") {
				unlike($_SESSION['customer_user'], $profile_user, $picture_id);
				exit ("<script>window.open('index.php?profile=$profile_user','_self')</script>");
			}
		}
	}
?>
</div>
