<div class="container">
<?php
	if (isset($_GET['profile'])) {
		$customer_user = $_GET['profile'];
		$picture_run = $db_con->query("SELECT * FROM pictures WHERE picture_author = '$customer_user'");
		while ($picture_row = $picture_run->fetch()) {
			$picture_name = $picture_row['picture_name'];
			$picture_source = $picture_row['picture_source'];
			$picture_date = $picture_row['picture_date'];
			$picture_like = $picture_row['picture_like'];
			$picture_bio = $picture_row['picture_bio'];
			$picture_comment = $picture_row['picture_comment'];
?>
	<div class="card-group mb-3" style="width: 975px; height: auto;">
		<div class="card">
			<img src="public/images/post_picture/<?php echo $picture_source ?>" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $picture_name ?></h5>
				<p class="card-text"><?php echo $picture_bio ?></p>
				<p class="card-text float-right"><small class="text-muted"><?php echo $picture_date ?></small></p>
			</div>
			<div class="card-footer">
				<i class="far fa-heart"></i> <?php echo $picture_like ?> Likes
				<p class="float-right"><i class="far fa-comment"></i> <?php echo $picture_comment ?> Commentaires</p>
			</div>
		</div>
	</div>
<?php
		}
	}
?>
</div>
