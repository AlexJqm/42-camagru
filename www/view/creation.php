<div class="container">
	<h4 class="mb-3">Choisir une image</h4>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="file" class="form-control-file" name="userfile"><br>
				</div>
			</div>
		</div>
		<div class="mb-3">
			<label for="picture_name">Titre</label>
			<div class="input-group">
				<input type="text" class="form-control" name="picture_name" required>
			</div>
		</div>
		<div class="mb-3">
			<label for="customer_bio">Description</label>
			<textarea type="text" class="form-control" name="picture_desc"></textarea>
		</div>
		<div class="row">
			<div class="col-md-1 ml-md-auto mb-3">
				<button type="submit" name="post_picture" class="btn btn-sm btn-warning">Poster</button>
			</div>
		</div>
	</form>
</div>
