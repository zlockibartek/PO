<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<form method="POST">
	<h4>Dane użytkownika</h4>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="name">Imię</label>
			<input type="text" class="form-control-plaintext" id="name" name="username" placeholder="Imię" value="<?= $content['name'] ?>" required>
		</div>
		<div class="col-md-4 mb-3">
			<label for="surname">Nazwisko</label>
			<input type="text" class="form-control-plaintext" id="surname" name="surname" placeholder="Nazwisko" value="<?= $content['surname'] ?>" required>
		</div>
		<div class="col-md-4 mb-3">
			<label for="phone">Numer telefonu</label>
			<input type="number" class="form-control-plaintext" id="phone" name="phone" placeholder="Numer telefonu" value="<?= $content['phone'] ?>">
		</div>
	</div>
	<h5>Adres</h5>
	<div class="form-row">
		<div id="switch" class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<input type="radio" class="btn-check" name="switch" value="deliveryAddress" id="deliveryAddress" autocomplete="off" checked>
			<label class="btn btn-outline-primary" for="deliveryAddress">Wysyłki</label>

			<input type="radio" class="btn-check" name="switch" value="paymentAddress" id="paymentAddress" autocomplete="off">
			<label class="btn btn-outline-primary" for="paymentAddress">Rozliczeniowy</label>

			<input type="radio" class="btn-check" name="switch" value="ownAddress" id="ownAddress" autocomplete="off">
			<label class="btn btn-outline-primary" for="ownAddress">Własny</label>

		</div>
	</div>
	<div class="form-row">
		<div class="col-md-9 mb-6">
			<label for="paymentCity">Miasto</label>
			<input type="text" class="form-control" id="paymentCity" placeholder="Miasto" name="paymentCity" value="<?= $content['paymentAddress'] ? $content['paymentAddress']->getTown() : '' ?>">
		</div>
		<div class="col-md-3 mb-3">
			<label for="paymentPostal">Kod pocztowy</label>
			<input type="text" class="form-control" id="paymentPostal" placeholder="Zip" name="paymentPostal" value="<?= $content['paymentAddress'] ? $content['paymentAddress']->getPostalCode() : '' ?>">
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-6 mb-6">
			<label for="paymentStreet">Ulica</label>
			<input type="text" class="form-control" id="paymentStreet" placeholder="Ulica" name="paymentStreet" value="<?= $content['paymentAddress'] ? $content['paymentAddress']->getStreet() : '' ?>">
		</div>
		<div class="col-md-3 mb-3">
			<label for="paymentBuilding">Numer budynku</label>
			<input type="text" class="form-control" id="paymentBuilding" placeholder="Numer budynku" name="paymentBuilding" value="<?= $content['paymentAddress'] ? $content['paymentAddress']->getBuilding() : '' ?>">
		</div>
		<div class="col-md-3 mb-3">
			<label for="paymentApartment">Numer mieszkania</label>
			<input type="text" class="form-control" id="paymentApartment" placeholder="Nr mieszkania" name="paymentApartment" value="<?= $content['paymentAddress'] ? $content['paymentAddress']->getApartament() : '' ?>">
		</div>
	</div>

	<input class="btn btn-primary" type="submit" value="Złóż zamówienie">
</form>