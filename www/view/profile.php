<style>
	.list-inline {
		margin-bottom: 0px;
	}
	.card-footer {
		padding-bottom: 0px !important;
		height: 48px !important;
	}
</style>

<div class="container">
<?php
	if (isset($_GET['profile'])) {
		$customer_user = $_GET['profile'];
		$profile_run  = $db_con->query("SELECT COUNT(*) FROM customers WHERE customer_user = '$customer_user'");
		if ($profile_run->fetchColumn() == 0)
			exit ("<script>window.open('index.php?404','_self')</script>");
		$profile_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$customer_user'");
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
					<li class="list-inline-item"><h1 class="display-4"><?php echo $customer_user ?></h1></li>
					<li class="list-inline-item"><h3><?php echo $customer_ln . ' ' . $customer_fn ?></h3></li>
				</ul>
				<p class="lead"><?php echo $customer_bio ?></p>
				<p><small>104 followers | Membre depuis Mars 2019</small></p>
				<button class="btn btn-sm btn-warning">Suivre</button>
				<button class="btn btn-sm btn-light">Contacter</button>
				<img src="public/images/profile_picture/<?php echo $customer_img ?>"
					class="rounded-circle float-right border border-warning"
					style="width: 120px; height: 120px; margin-top: 15px; border-width:3px !important;"
					alt="Image de profil">
			</div>
		</div>
		<?php
		}
	}
?>
</div>
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
