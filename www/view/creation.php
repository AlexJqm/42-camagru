<?php require_once('function/upload_picture_content.php'); ?>

<div class="container">
	<h4 class="mb-3 mb-2 text-light" onclick="show_form()">Creer votre montage depuis une <span class="text-warning">image</span> <i class="fas fa-chevron-down"></i></h4>
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
				<input type="text" class="form-control bg-dark text-white" name="picture_name" required>
			</div>
		</div>
		<div class="mb-3">
			<label for="customer_bio">Description</label>
			<textarea type="text" class="form-control bg-dark text-white" name="picture_desc"></textarea>
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend bg-dark">
				<label class="input-group-text" onclick="window.open('index.php?filter', '_blank');" for="filter_image" style="cursor: pointer">Voir les filtres</label>
			</div>
			<select class="custom-select bg-dark text-white" name="filter_image" id="filter_image">
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
	<h4 class="mb-3 mt-2 text-light" onclick="show_form()">Creer votre montage avec votre <span class="text-warning">wecbam</span> <i class="fas fa-chevron-down"></i></h4>
	<form action="" method="POST" enctype="multipart/form-data" onsubmit="preparePhoto();" id="form-camera">
		<div class="row">
			<div class="col">
				<video id="video" class="border mr-4" width="430" autoplay></video>
				<canvas id="canvas" class="border" width="640" height="480" ondrop="drop(event)" ondragover="Dragov(event)"></canvas>
				<input type="button" id="snap" class="btn btn-sm btn-warning mb-4" value="Prendre une photo" style="cursor: pointer">
				<input type="button" id="reset" onclick="clearDraw()" class="btn btn-sm btn-warning mb-4" value="Recommencer" style="cursor: pointer"><br>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text">Listes des stickers</label>
					</div>
					<select class="custom-select bg-dark text-white" id="sticker" onchange="sticker_preview()">
						<option selected value="banana">Banane</option>
						<option value="apple">Pomme</option>
						<option value="neon-burger">Neon Burger</option>
						<option value="42">Logo 42</option>
						<option value="heart">Coeur</option>
					</select>
				</div>
				<small class="form-text text-muted">
					Sélectionner votre sticker, faite un cliqué/déplacé de l'image sur votre capture d'image.
				</small>
				<img src="" id="preview" ondragstart='godrag(event)'>
				<script>
					function sticker_preview() {
						var sticker = document.getElementById("sticker").value;
						document.getElementById("preview").src="public/images/stickers/" + sticker + ".png";
					}
				</script>
								<input id="photo" name="photo" type="hidden">
			</div>
		</div>
		<div class="mb-3 mt-3">
			<label for="picture_name">Titre</label>
			<div class="input-group">
				<input type="text" class="form-control bg-dark text-white" name="picture_name" required>
			</div>
		</div>
		<div class="mb-3">
			<label for="customer_bio">Description</label>
			<textarea type="text" class="form-control bg-dark text-white" name="picture_desc"></textarea>
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" onclick="window.open('index.php?filter', '_blank');" for="filter_camera" style="cursor: pointer">Voir les filtres</label>
			</div>
			<select class="custom-select bg-dark text-white" name="filter_camera" id="filter_camera">
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
<script src="public/js/sticker.js"></script>
<script src="public/js/show_hidden_form.js"></script>
