<?php require_once('function/upload_picture_content.php'); ?>

<div class="container">
	<h4 class="mb-3 mb-2 text-secondary" onclick="show_form()">Creer votre montage depuis une <span class="text-warning">image</span> <i class="fas fa-chevron-down"></i></h4>
	<form action="" method="POST" enctype="multipart/form-data" id="form-picture">
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
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" onclick="window.open('index.php?filter', '_blank');" for="filter_image" style="cursor: pointer">Voir les filtres</label>
			</div>
			<select class="custom-select" name="filter_image" id="filter_image">
				<option selected value="Normal">Normal</option>
				<option value="1977">1977</option>
				<option value="Aden">Aden</option>
				<option value="Amaro">Amaro</option>
				<option value="Ashby">Ashby</option>
				<option value="Brannan">Brannan</option>
				<option value="Brooklyn">Brooklyn</option>
				<option value="Charmes">Charmes</option>
				<option value="Clarendon">Clarendon</option>
				<option value="Crema">Crema</option>
				<option value="Dogpatch">Dogpatch</option>
				<option value="Earlybird">Earlybird</option>
				<option value="Gingham">Gingham</option>
				<option value="Ginza">Ginza</option>
				<option value="Hefe">Hefe</option>
				<option value="Helena">Helena</option>
				<option value="Hudson">Hudson</option>
				<option value="Inkwell">Inkwell</option>
				<option value="Kelvin">Kelvin</option>
				<option value="Juno">Juno</option>
				<option value="Lark">Lark</option>
				<option value="Lo-Fi">Lo-Fi</option>
				<option value="Ludwig">Ludwig</option>
				<option value="Maven">Maven</option>
				<option value="Mayfair">Mayfair</option>
				<option value="Moon">Moon</option>
				<option value="Nashville">Nashville</option>
				<option value="Perpetua">Perpetua</option>
				<option value="Poprocket">Poprocket</option>
				<option value="Reyes">Reyes</option>
				<option value="Rise">Rise</option>
				<option value="Sierra">Sierra</option>
				<option value="Skyline">Skyline</option>
				<option value="Slumber">Slumber</option>
				<option value="Stinson">Stinson</option>
				<option value="Sutro">Sutro</option>
				<option value="Toaster">Toaster</option>
				<option value="Valencia">Valencia</option>
				<option value="Vesper">Vesper</option>
				<option value="Walden">Walden</option>
				<option value="Willow">Willow</option>
				<option value="X-Pro II">X-Pro II</option>
			</select>
		</div>
		<div class="row">
			<div class="col-md-1 ml-md-auto mb-3">
				<button type="submit" name="post_upload_picture" class="btn btn-sm btn-warning">Poster</button>
			</div>
		</div>
	</form>
</div>

<?php require_once('function/upload_photo_content.php'); ?>

<div class="container">
	<h4 class="mb-3 mt-2 text-secondary" onclick="show_form()">Creer votre montage avec votre <span class="text-warning">wecbam</span> <i class="fas fa-chevron-down"></i></h4>
	<form action="" method="POST" enctype="multipart/form-data" onsubmit="preparePhoto();" id="form-camera">
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
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" onclick="window.open('index.php?filter', '_blank');" for="filter_camera" style="cursor: pointer">Voir les filtres</label>
			</div>
			<select class="custom-select" name="filter_camera" id="filter_camera">
				<option selected value="Normal">Normal</option>
				<option value="1977">1977</option>
				<option value="Aden">Aden</option>
				<option value="Amaro">Amaro</option>
				<option value="Ashby">Ashby</option>
				<option value="Brannan">Brannan</option>
				<option value="Brooklyn">Brooklyn</option>
				<option value="Charmes">Charmes</option>
				<option value="Clarendon">Clarendon</option>
				<option value="Crema">Crema</option>
				<option value="Dogpatch">Dogpatch</option>
				<option value="Earlybird">Earlybird</option>
				<option value="Gingham">Gingham</option>
				<option value="Ginza">Ginza</option>
				<option value="Hefe">Hefe</option>
				<option value="Helena">Helena</option>
				<option value="Hudson">Hudson</option>
				<option value="Inkwell">Inkwell</option>
				<option value="Kelvin">Kelvin</option>
				<option value="Juno">Juno</option>
				<option value="Lark">Lark</option>
				<option value="Lo-Fi">Lo-Fi</option>
				<option value="Ludwig">Ludwig</option>
				<option value="Maven">Maven</option>
				<option value="Mayfair">Mayfair</option>
				<option value="Moon">Moon</option>
				<option value="Nashville">Nashville</option>
				<option value="Perpetua">Perpetua</option>
				<option value="Poprocket">Poprocket</option>
				<option value="Reyes">Reyes</option>
				<option value="Rise">Rise</option>
				<option value="Sierra">Sierra</option>
				<option value="Skyline">Skyline</option>
				<option value="Slumber">Slumber</option>
				<option value="Stinson">Stinson</option>
				<option value="Sutro">Sutro</option>
				<option value="Toaster">Toaster</option>
				<option value="Valencia">Valencia</option>
				<option value="Vesper">Vesper</option>
				<option value="Walden">Walden</option>
				<option value="Willow">Willow</option>
				<option value="X-Pro II">X-Pro II</option>
			</select>
		</div>
		<div class="row">
			<div class="col-md-1 ml-md-auto mb-3">
				<button id="submit_photo" type="submit" name="post_create_picture" class="btn btn-sm btn-warning">Poster</button>
			</div>
		</div>
	</form>
</div>

<script src="public/js/webcam.js"></script>
<script src="public/js/show_hidden_form.js"></script>
