<div class="container">
	<h5 class="pb-2 mb-0 text-light">Derniers notifications</h5>
	<div class="my-3 p-3 bg-dark text-light rounded">
		<h6 class="border-bottom border-gray pb-2 mb-0"><i class="far fa-image"></i> Photos</h6>
		<?php
			$customer_user = $_SESSION['customer_user'];
			$notif_like_run = $db_con->query("SELECT * FROM likes, pictures WHERE pictures.picture_author = '$customer_user' AND
											likes.like_user = pictures.picture_author AND pictures.picture_id = likes.picture_id ORDER BY likes.like_id DESC");
			$notif_follower_run = $db_con->query("SELECT * FROM followers, customers WHERE followers.follower_user = '$customer_user' AND
												followers.customer_user = customers.customer_user ORDER BY followers.follower_id DESC");
			$notif_comment_run = $db_con->query("SELECT * FROM comments, pictures WHERE pictures.picture_author = '$customer_user' ORDER BY comments.comment_id DESC");
			while ($notif_like_row = $notif_like_run->fetch()) {
		?>
		<div class="media text-muted pt-3">
			<p class="media-body pb-3 mb-0 small lh-125 text-light border-bottom border-gray">
				<strong class="text-light"><?php echo $notif_like_row['customer_user'] ?></strong>
				a aimé votre photo <?php echo $notif_like_row['picture_name'] ?>.
				<i class="far fa-times-circle float-right pt-1 text-danger" style="cursor: pointer"></i>
			</p>
		</div>
		<?php
			}
		?>
	</div>
	<div class="my-3 p-3 bg-dark text-light rounded">
			<h6 class="border-bottom border-gray pb-2 mb-0"><i class="fas fa-user-friends"></i> Follows</h6>
		<?php
			while ($notif_follower_row = $notif_follower_run->fetch()) {
		?>
		<div class="media text-muted pt-3">
			<p class="media-body pb-3 mb-0 small lh-125 text-light border-bottom border-gray">
				<strong class="text-light"><?php echo $notif_follower_row['customer_user'] ?></strong>
				vous follow.
				<i class="far fa-times-circle float-right pt-1 text-danger" style="cursor: pointer"></i>
			</p>
		</div>
		<?php
			}
		?>
	</div>
	<div class="my-3 p-3 bg-dark text-light rounded">
			<h6 class="border-bottom border-gray pb-2 mb-0"><i class="fas fa-user-friends"></i> Commentaires</h6>
		<?php
			while ($notif_comment_row = $notif_comment_run->fetch()) {
		?>
		<div class="media text-muted pt-3">
			<p class="media-body pb-3 mb-0 small lh-125 text-light border-bottom border-gray">
				<strong class="text-light"><?php echo $notif_comment_row['customer_user'] ?></strong>
				a commenté votre photo <?php echo $notif_comment_row['picture_name'] ?>.
				<i class="far fa-times-circle float-right pt-1 text-danger" style="cursor: pointer"></i>
			</p>
		</div>
		<?php
			}
		?>
	</div>
</div>
