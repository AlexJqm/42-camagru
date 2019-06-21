<div class="container">
	<h4 class="mb-3 mb-2 text-secondary" onclick="show_form_picture()">Creer votre montage depuis une <span class="text-warning">image</span> <i class="fas fa-chevron-down"></i></h4>
	<form action="" method="POST" enctype="multipart/form-data" id="form-picture" style="display: none;">
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
				<button type="submit" name="post_upload_picture" class="btn btn-sm btn-warning">Poster</button>
			</div>
		</div>
	</form>
</div>

<div class="container">
	<h4 class="mb-3 mt-2 text-secondary" onclick="show_form_camera()">Creer votre montage avec votre <span class="text-warning">wecbam</span> <i class="fas fa-chevron-down"></i></h4>
	<form action="" method="POST" enctype="multipart/form-data" onsubmit="preparePhoto();" id="form-camera" style="display: none;">
		<div class="row">
			<div class="col">
				<table class="table table-borderless">
					<tbody>
						<tr class="table-transparent">
							<td><video id="video" class="border" width="430"  autoplay></video></td>
							<td><canvas id="canvas" class="border" width="640" height="480"></canvas></td>
						</tr>
					</tbody>
				</table>
				<button id="snap" class="btn btn-sm btn-warning mb-4">Prendre une photo</button>
				<input id="photo" name="photo" type="hidden">
			</div>
		</div>
		<div class="mb-3 mt-3">
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
				<button id="submit_photo" type="submit" name="post_create_picture" class="btn btn-sm btn-warning">Poster</button>
			</div>
		</div>
	</form>
</div>

<script src="public/js/webcam.js"></script>
<script>
	function show_form_picture() {
		var x = document.getElementById("form-picture");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
	function show_form_camera() {
		var x = document.getElementById("form-camera");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
</script>
