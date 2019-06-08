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
		if (isset($_GET['search'])) {
			$search_target = $_GET['search'];
			$search_run = $db_con->query("SELECT * FROM customers WHERE (customer_user LIKE '%$search_target%') OR (customer_email LIKE '%$search_target%')
										OR (customer_fn LIKE '%$search_target%') OR (customer_ln LIKE '%$search_target%')");
			while ($search_row = $search_run->fetch()) {
				$customer_user = $search_row['customer_user'];
				$customer_email = $search_row['customer_email'];
				$customer_fn = $search_row['customer_fn'];
				$customer_ln = $search_row['customer_ln'];
				$customer_img = $search_row['customer_img'];
	?>
		<tr style="cursor: pointer;" onclick="window.location='index.php?profil=<?php echo $customer_user ?>';">
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
