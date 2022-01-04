<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<form class="needs-validation" novalidate>
	<h4>Dane użytkownika</h4>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="validationTooltip01">Imię</label>
			<input type="text" class="form-control-plaintext" id="validationTooltip01" placeholder="First name" value="Bartłomiej">
		</div>
		<div class="col-md-4 mb-3">
			<label for="validationTooltip02">Nazwisko</label>
			<input type="text" class="form-control-plaintext" id="validationTooltip02" placeholder="Last name" value="Złocki">
		</div>
		<div class="col-md-4 mb-3">
			<label for="validationTooltip02">Numer telefonu</label>
			<input type="number" class="form-control-plaintext" id="validationTooltip02" placeholder="Last name" value="Złocki">
		</div>
	</div>
	<h5>Adres rozliczeniowy</h5>
	<?php var_dump($result) ?>
	<div class="form-row">
		<div class="col-md-9 mb-6">
			<label for="validationTooltip04">Miasto</label>
			<input type="text" class="form-control" id="validationTooltip04" placeholder="Miasto" required>
		</div>
		<div class="col-md-3 mb-3">
			<label for="validationTooltip05">Kod pocztowy</label>
			<input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-6 mb-6">
			<label for="validationTooltip03">Ulica</label>
			<input type="text" class="form-control" id="validationTooltip03" placeholder="Ulica" required>
			<div class="invalid-tooltip">
				Please provide a valid city.
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<label for="validationTooltip03">Numer budynku</label>
			<input type="text" class="form-control" id="validationTooltip03" placeholder="Ulica" required>
			<div class="invalid-tooltip">
				Please provide a valid city.
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<label for="validationTooltip04">Numer mieszkania</label>
			<input type="text" class="form-control" id="validationTooltip04" placeholder="Miasto" required>
			<div class="invalid-tooltip">
				Please provide a valid state.
			</div>
		</div>
	</div>

	<h5>Adres wysyłki</h5>
	<div class="form-row">
		<div class="col-md-9 mb-6">
			<label for="validationTooltip04">Miasto</label>
			<input type="text" class="form-control" id="validationTooltip04" placeholder="Miasto" required>
		</div>
		<div class="col-md-3 mb-3">
			<label for="validationTooltip05">Kod pocztowy</label>
			<input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-6 mb-6">
			<label for="validationTooltip03">Ulica</label>
			<input type="text" class="form-control" id="validationTooltip03" placeholder="Ulica" required>
			<div class="invalid-tooltip">
				Please provide a valid city.
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<label for="validationTooltip03">Numer budynku</label>
			<input type="text" class="form-control" id="validationTooltip03" placeholder="Ulica" required>
			<div class="invalid-tooltip">
				Please provide a valid city.
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<label for="validationTooltip04">Numer mieszkania</label>
			<input type="text" class="form-control" id="validationTooltip04" placeholder="Miasto" required>
			<div class="invalid-tooltip">
				Please provide a valid state.
			</div>
		</div>
	</div>
	<button class="btn btn-primary" type="submit">Aktualizuj dane</button>
	<a href="<?= $backButton ?>"><button type="button" class="btn btn-primary">Powrót</button></a><br><br>
</form>