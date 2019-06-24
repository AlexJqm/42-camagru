<div class="container">
	<table class="table table-borderless table-dark rounded">
		<tbody>
		<?php
			require_once('function/remove_content.php');
			$content_run = $db_con->query("SELECT * FROM pictures WHERE picture_author = '$_SESSION[customer_user]' ORDER BY picture_id DESC");
			while ($content_row = $content_run->fetch()) {
				$picture_id = $content_row['picture_id'];
				$picture_author = $content_row['picture_author'];
				$picture_name = $content_row['picture_name'];
				$picture_source = $content_row['picture_source'];
				$picture_date = $content_row['picture_date'];
				$picture_like = $content_row['picture_like'];
				$picture_desc = $content_row['picture_desc'];
				$picture_comment = $content_row['picture_comment'];
		?>
			<tr>
				<th scope="row"><?php echo $picture_id ?></th>
				<td><?php echo $picture_name ?></td>
				<td>Publié le <?php echo $picture_date ?></td>
				<td><?php echo $picture_like ?> Likes</td>
				<td><a href="index.php?content=<?php echo $picture_id ?>"><i class="far fa-eye text-light"></i></a></td>
				<td><a href="index.php?manage_content=del_<?php echo $picture_id ?>"><i class="far fa-times-circle text-danger"></i></a></td>
			</tr>
		<?php
				if (isset($_GET['manage_content']) && $_GET['manage_content'] == "del_$picture_id") {
					remove_content($_SESSION['customer_user'], $picture_id);
					exit ("<script>window.open('index.php?manage_content','_self')</script>");
				}
			}
		?>
		</tbody>
	</table>
</div>
