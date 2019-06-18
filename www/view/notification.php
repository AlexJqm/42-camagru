<div class="container">
	<h5 class="pb-2 mb-0">Derniers notifications</h5>
	<div class="my-3 p-3 bg-light rounded">
		<h6 class="border-bottom border-gray pb-2 mb-0"><i class="far fa-image"></i> Photos</h6>
		<?php
			$notif_like_run = $db_con->query("SELECT * FROM likes WHERE like_user = '$_SESSION[customer_user]'");
			$notif_follower_run = $db_con->query("SELECT * FROM followers WHERE follower_user = '$_SESSION[customer_user]'");
			while ($notif_like_row = $notif_like_run->fetch()) {
		?>
		<div class="media text-muted pt-3">
			<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				<strong class="text-gray-dark"><?php echo $notif_like_row['customer_user'] ?></strong>
				a aimé votre photo <?php echo $notif_like_row['picture_id'] ?>. <i class="fas fa-eye-slash float-right pt-1 ml-1 text-dark" style="cursor: pointer"></i>
				<i class="far fa-times-circle float-right pt-1 text-danger" style="cursor: pointer"></i>
			</p>
		</div>
		<?php
			}
		?>
		</div>
		<div class="my-3 p-3 bg-light rounded">
			<h6 class="border-bottom border-gray pb-2 mb-0"><i class="fas fa-user-friends"></i> Follows</h6>
		<?php
			while ($notif_follower_row = $notif_follower_run->fetch()) {
		?>
		<div class="media text-muted pt-3">
			<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				<strong class="text-gray-dark"><?php echo $notif_follower_row['customer_user'] ?></strong>
				vous follow. <i class="fas fa-eye-slash float-right pt-1 ml-1 text-dark" style="cursor: pointer"></i>
				<i class="far fa-times-circle float-right pt-1 text-danger" style="cursor: pointer"></i>
			</p>
		</div>
		<?php
			}
		?>
	</div>
</div>
