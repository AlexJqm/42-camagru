<div class="container">
	<?php
	require_once('function/like.php');
	require_once('function/comment.php');

	if (isset($_GET['content'])) {
		$content_id = $_GET['content'];
		$content_run  = $db_con->query("SELECT COUNT(*) FROM pictures WHERE picture_id = '$content_id'");
		if ($content_run->fetchColumn() == 0)
			exit ("<script>window.open('index.php?404','_self')</script>");
		$content_run = $db_con->query("SELECT * FROM pictures WHERE picture_id = '$content_id'");
		while ($content_row = $content_run->fetch()) {
			$picture_id = $content_row['picture_id'];
			$picture_author = $content_row['picture_author'];
			$picture_name = $content_row['picture_name'];
			$picture_source = $content_row['picture_source'];
			$picture_date = $content_row['picture_date'];
			$picture_like = $content_row['picture_like'];
			$picture_desc = $content_row['picture_desc'];
			$picture_comment = $content_row['picture_comment'];
			$picture_filter = $content_row['picture_filter'];
	?>
	<div class="card-group mb-3">
		<div class="card bg-dark text-white">
			<img src="public/images/post_picture/<?php echo $picture_source ?>"
				class="card-img-top filter-<?php echo $picture_filter ?>" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $picture_name ?></h5>
				<p class="card-text"><?php echo $picture_desc ?></p>
				<p class="card-text float-right"><small class="text-muted"><?php echo $picture_date ?></small></p>
			</div>
			<div class="card-footer">
				<?php
					$like_run = $db_con->query("SELECT COUNT(*) FROM likes WHERE customer_user = '$_SESSION[customer_user]'
												AND like_user = '$picture_author' AND like_bool = '1' AND picture_id = '$picture_id'");
					if (!$like_run->fetchColumn())
						echo '<a href="index.php?content=' . $picture_id . '&action=like' . $picture_id . '"><i class="far fa-heart text-light"></i></a>';
					else
						echo '<a href="index.php?content=' . $picture_id . '&action=unlike' . $picture_id . '"><i class="fas fa-heart text-danger"></i></a>'
				?>
				<?php echo print_like($picture_author, $picture_id)[0] ?> Likes
				<p class="float-right"><i class="far fa-comment"></i> <?php echo comment_count($picture_id); ?> Commentaires</p>
			</div>
		</div>
	</div>
	<?php
		}
		if (isset($_GET['content']) && $_GET['action'] == "like$picture_id") {
			like($_SESSION['customer_user'], $picture_author, $picture_id);
			exit ("<script>window.open('index.php?content=$picture_id','_self')</script>");
		} if (isset($_GET['content']) && $_GET['action'] == "unlike$picture_id") {
			unlike($_SESSION['customer_user'], $picture_author, $picture_id);
			exit ("<script>window.open('index.php?content=$picture_id','_self')</script>");
		}
	}
	?>

	<form action="" method="POST" enctype="multipart/form-data">
		<div class="card bg-dark text-white mb-2">
			<div class="card-body">
				<h5 class="card-title">Écrire un commentaire</h5>
				<textarea type="text" class="form-control bg-dark text-white mb-3" name="comment_content"></textarea>
				<input type="submit" name="send_comment" class="btn btn-warning btn-sm float-right" value="Envoyer">
			</div>
		</div>
	</form>

	<?php
		if (isset($_GET['content'])) {
			$picture_id = $_GET['content'];
			$content_run = $db_con->query("SELECT * FROM comments, customers WHERE comments.picture_id = '$picture_id' AND customers.customer_user = comments.customer_user ORDER BY comment_id DESC");
			$customer_run = $db_con->query("SELECT * FROM comments, customers
											WHERE comments.customer_user = customers.customer_user");

	?>
	<?php
		while ($comment_row = $content_run->fetch()) {
	?>
	<div class="card bg-dark text-white mb-2">
		<div class="card-body">
			<h5 class="card-title" onclick="window.location.href='index.php?profile=<?php echo $comment_row['customer_user'] ?>'" style="cursor: pointer;">
				<img src="public/images/profile_picture/<?php echo $comment_row['customer_img'] ?>" class="rounded-circle" style="width: 25px; height: 25px;" alt="Image de profil">
				<?php echo $comment_row['customer_user'] ?>
			</h5>
			<p class="card-text"><?php echo $comment_row['comment_content'] ?></p>
			<p class="card-text float-right"><small class="text-muted"><?php echo $comment_row['comment_date'] ?></small></p>
		</div>
	</div>
	<?php
				}
		}
	?>
</div>
