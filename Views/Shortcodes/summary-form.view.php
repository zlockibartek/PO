<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<form method="POST">
	<h4>Dane użytkownika</h4>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="name">Imię</label>
			<input type="text" class="form-control-plaintext" id="name" name="username" placeholder="Imię" required>
		</div>
		<div class="col-md-4 mb-3">
			<label for="surname">Nazwisko</label>
			<input type="text" class="form-control-plaintext" id="surname" name="surname" placeholder="Nazwisko" required>
		</div>
		<div class="col-md-4 mb-3">
			<label for="phone">Numer telefonu</label>
			<input type="number" class="form-control-plaintext" id="phone" name="phone" placeholder="Numer telefonu">
		</div>
	</div>
	<h5>Adres</h5>
	<div class="form-row">
		<div id="switch" class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<input type="radio" class="btn-check" name="switch" value="deliveryAddress" id="deliveryAddress" autocomplete="off" checked>
			<label class="btn btn-outline-primary" for="deliveryAddress">Wysyłki</label>

			<input type="radio" class="btn-check" name="switch" value="paymentAddress" id="paymentAddress" autocomplete="off">
			<label class="btn btn-outline-primary" for="paymentAddress">Rozliczeniowy</label>

		</div>
	</div>
	<div id="payment" hidden>

		<div class="form-row">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="ownPayment" id="ownPayment">
				<label class="form-check-label" for="ownPayment">Własny</label>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-9 mb-6">
				<label for="paymentCity">Miasto</label>
				<input type="text" class="form-control" id="paymentCity" placeholder="Miasto" name="paymentCity" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="paymentPostal">Kod pocztowy</label>
				<input type="text" class="form-control" id="paymentPostal" placeholder="Zip" name="paymentPostalCode" required>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6 mb-6">
				<label for="paymentStreet">Ulica</label>
				<input type="text" class="form-control" id="paymentStreet" placeholder="Ulica" name="paymentStreet" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="paymentBuilding">Numer budynku</label>
				<input type="text" class="form-control" id="paymentBuilding" placeholder="Numer budynku" name="paymentBuilding" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="paymentApartment">Numer mieszkania</label>
				<input type="text" class="form-control" id="paymentApartment" placeholder="Nr mieszkania" name="paymentApartment">
			</div>
		</div>
	</div>

	<div id="delivery">
		<div class="form-row">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="ownDelivery" id="ownDelivery">
				<label class="form-check-label" for="ownDelivery">Własny</label>
			</div>
		</div>
		<div class="form-row">

			<div class="col-md-9 mb-6">
				<label for="deliveryCity">Miasto</label>
				<input type="text" class="form-control" id="deliveryCity" placeholder="Miasto" name="deliveryCity" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="deliveryPostalCode">Kod pocztowy</label>
				<input type="text" class="form-control" id="deliveryPostalCode" placeholder="Zip" name="deliveryPostalCode" require>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6 mb-6">
				<label for="deliveryStreet">Ulica</label>
				<input type="text" class="form-control" id="deliveryStreet" placeholder="Ulica" name="deliveryStreet" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="deliveryBuilding">Numer budynku</label>
				<input type="text" class="form-control" id="deliveryBuilding" placeholder="Numer budynku" name="deliveryBuilding" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="deliveryApartment">Numer mieszkania</label>
				<input type="text" class="form-control" id="deliveryApartment" placeholder="Nr mieszkania" name="deliveryApartment">
			</div>
		</div>
	</div>


	<h5>Płatność i dostawa</h5>
	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="deliverer">Dostawca</label>
			<select class="form-control" id="deliverer" name="deliverer">
				<?php foreach ($deliverers as $deliverer) : ?>
					<option data-price="<?= $deliverer->getPrice() ?>" value="<?= $deliverer->getName() ?>"><?= $deliverer->getName() . ' (' . $deliverer->getPrice() . ' zł)' ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<br>
	<div class="form-row">

		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="paymentMethod" value="cash" id="cash">
			<label class="form-check-label" for="cash">
				Gotówka przy odbiorze
			</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="paymentMethod" value="transfer" id="transfer" checked>
			<label class="form-check-label" for="transfer">
				Przelew
			</label>
		</div>
	</div>
	<h5>Faktura</h5>
	<div class="form-row">
		<div class="col-md-3 mb-3">
			<label for="deliveryApartment">Numer NIP</label>
			<input type="text" class="form-control" id="deliveryApartment"  name="nip">
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="deliverer">Stawka VAT</label>
			<select class="form-control" id="deliverer" name="tax">
				<?php foreach ($taxes as $tax) : ?>
					<option value="<?= $tax ?>"><?= $tax ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<br>
	<input class="btn btn-primary" type="submit" value="Złóż zamówienie">
</form>