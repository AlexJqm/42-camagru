<?php
	require_once('function/connect.php');
	require_once('function/follower.php');
	require_once('function/comment.php');
	require_once('function/auth.php');
	require_once('function/like.php');
	$db_con = db_con();
?>

<div class="container">
<?php
		$picture_run = $db_con->query("SELECT * FROM pictures ORDER BY picture_id DESC LIMIT $_SESSION[newsfeed]");
		while ($picture_row = $picture_run->fetch()) {
			$picture_id = $picture_row['picture_id'];
			$picture_name = $picture_row['picture_name'];
			$picture_source = $picture_row['picture_source'];
			$picture_date = $picture_row['picture_date'];
			$picture_like = $picture_row['picture_like'];
			$picture_desc = $picture_row['picture_desc'];
			$picture_author = $picture_row['picture_author'];
			$picture_comment = $picture_row['picture_comment'];
			$picture_filter = $picture_row['picture_filter'];
?>
	<div class="card-group mb-3" style="max-width: 975px;">
		<div class="card text-light bg-dark">
			<img src="public/images/post_picture/<?php echo $picture_source ?>" class="card-img-top img-fluid filter-<?php echo $picture_filter ?>" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $picture_name ?></h5>
				<p class="card-text"><?php echo $picture_desc ?></p>
				<p class="card-text float-right"><small class="text-muted"><?php echo $picture_date ?></small></p>
			</div>
			<div class="card-footer">
				<?php
					$like_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE customer_user = '$_SESSION[user]'
												AND like_user = '$picture_author' AND like_bool = '1' AND picture_id = '$picture_id'");
					if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
						if (!$like_run->fetchColumn())
							echo '<a href="index.php?newsfeed=&action=like' . $picture_id . '"><i class="far fa-heart text-secondary"></i></a> ';
						else
							echo '<a href="index.php?newsfeed=&action=unlike' . $picture_id . '"><i class="fas fa-heart text-danger"></i></a> ';
					}
					else
						echo '<i class="far fa-heart text-light"></i> ';
				echo print_like($picture_author, $picture_id)[0];
				?> Likes
				<a href="index.php?content=<?php echo $picture_id ?>"><p class="float-right text-light"><i class="far fa-comment"></i> <?php echo comment_count($picture_id); ?> Commentaires</p></a>
				<span class="float-right mr-2" onclick="window.open('view/share.php?content=<?php echo $picture_id ?>&user=<?php echo $_SESSION['user'] ?>','Patarger','resizable,height=260,width=370');" target="_blank" style="cursor: pointer;"><i class="fas fa-share text-light"></i> Partager</span>
			</div>
		</div>
	</div>
<?php
			if (check_auth($_SESSION['user'], $_SESSION['auth'])) {
				if (isset($picture_author) && $_GET['action'] == "like$picture_id") {
					like($_SESSION['user'], $picture_author, $picture_id);
					exit ("<script>window.open('index.php?newsfeed#more','_self')</script>");
				} if (isset($picture_author) && $_GET['action'] == "unlike$picture_id") {
					unlike($_SESSION['user'], $picture_author, $picture_id);
					exit ("<script>window.open('index.php?newsfeed#more','_self')</script>");
				}
			}
		}

?>
	<form action="index.php?showmore" method="POST">
		<div class="row text-center" style="max-width: 975px;">
			<div class="col align-self-center">
				<button type="submit" id="more" class="btn btn-lg btn-warning">Voir plus</button>
			</div>
		</div>
	</form>
</div>
