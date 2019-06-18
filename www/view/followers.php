<div class="container">
	<div class="row text-center">
<?php
	$follower_run = $db_con->query("SELECT * FROM customers INNER JOIN followers ON customers.customer_user = followers.customer_user
									WHERE followers.follower_user = '$_SESSION[customer_user]' AND followers.follower_bool = '1'");
	while ($follower_row = $follower_run->fetch()) {
?>
		<div class="col-sm-4 mb-3">
			<div class="card" style="width: 18rem;">
				<div class="card-header text-center">
					<img src="public/images/profile_picture/<?php echo $follower_row['customer_img'] ?>"
								class="rounded-circle border"
								style="width: 120px; height: 120px; margin-top: 15px;"
								alt="Image de profil">
				</div>
				<div class="card-body text-center">
					<h5 class="card-title"><?php echo $follower_row['customer_user'] ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">
					<?php
						if (!$follower_row['customer_fn'] && !$follower_row['customer_ln'])
							echo "Anonyme";
						else
							echo $follower_row['customer_fn'] . ' ' . $follower_row['customer_ln'];
					?>
					</h6>
					<a href="index.php?profile=<?php echo $follower_row['customer_user'] ?>"><button class="btn btn-sm btn-secondary">Voir profil</button></a>
				</div>
			</div>
		</div>
<?php
	}
?>
	</div>
</div>
