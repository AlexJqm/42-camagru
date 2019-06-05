<div class="container">
	<h4 class="mb-3">Informations</h4>
	<form class="needs-validation" action="" method="POST">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="firstName">Nom</label>
				<input type="text" class="form-control" id="firstName" placeholder="" value="" required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="lastName">Prenom</label>
				<input type="text" class="form-control" id="lastName" placeholder="" value="" required>
			</div>
		</div>

		<div class="mb-3">
			<label for="username">Pseudonyme</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">@</span>
				</div>
				<input type="text" class="form-control" id="username" placeholder="Username" required>
			</div>
		</div>

		<div class="mb-3">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" placeholder="you@example.com">
		</div>

		<div class="mb-3">
			<label for="address">Biographie</label>
			<input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
		</div>

		<button type="submit" name="customer_info" class="btm btn-sm btn-secondary" style="margin-left: 90%;">Modifier</button>

	</form>
	<hr class="mb-4">
</div>
