<div class="container">
	<table class="table table-borderless table-hover">
	<thead class="">
		<tr class="bg-light text-secondary">
			<th></th>
			<th>Pseudonyme</th>
			<th>Email</th>
			<th>Nom/Prenom</th>
		</tr>
	</thead>
	<tbody>
	<?php
		if (isset($_GET['profil'])) {
			$customer_user = $_GET['profil'];
			$profil_run  = $db_con->query("SELECT COUNT(*) FROM customers WHERE customer_user = '$customer_user'");
			if ($profil_run->fetchColumn() == 0)
				exit ("<script>window.open('index.php?404','_self')</script>");
			$profil_run = $db_con->query("SELECT * FROM customers WHERE customer_user = '$customer_user'");
			while ($profil_row = $profil_run->fetch()) {
				$customer_email = $profil_row['customer_email'];
				$customer_ln = $profil_row['customer_ln'];
				$customer_fn = $profil_row['customer_fn'];
				$customer_img = $profil_row['customer_img'];
				$customer_bio = $profil_row['customer_bio'];
			?>
			<tr style="cursor: pointer;" onclick="window.location='index.php';">
				<td><img src="uploads/<?php echo $customer_img ?>" class="rounded-circle" style="width: 25px; height: 25px;" alt="Image de profil"></td>
				<td><?php echo $customer_user ?></td>
				<td><?php echo $customer_email ?></td>
				<td><?php echo $customer_ln . " " . $customer_fn ?></td>
			</tr>
			<?php
			}
		}
	?>
	</tbody>
	</table>
</div>
