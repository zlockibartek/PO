<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<form class="needs-validation" novalidate>
	<h3>Dodaj produkt</h3>
	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="validationTooltip03">Nazwa produktu</label>
			<input type="password" class="form-control" id="validationTooltip03" placeholder="Wprowadź nazwę produktu" required>
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="exampleFormControlTextarea1" class="form-label">Opis produktu</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Wprowadź opis produktu" rows="3"></textarea>
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="productQuantity" class="form-label">Ilość sztuk w magazynie</label>
			<input type="number" class="form-control" id="productQuantity" placeholder="Wprowadź liczbę sztuk">
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="productPrice" class="form-label">Cena</label>
			<input type="number" class="form-control" id="productPrice" placeholder="Wprowadź cenę produktu">
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="productDiscount" class="form-label">Rabat</label>
			<input type="number" class="form-control" id="productDiscount" placeholder="Wprowadź rabat" value="0">
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="selectWeight">Waga produktu</label>
			<select class="form-control" id="selectWeight">
				<option selected>Wybierz wagę</option>
				<option value="1">50</option>
				<option value="2">100</option>
				<option value="3">150</option>
			</select>
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="formFile" class="form-label">Dodaj zdjęcie</label>
			<input class="form-control" type="file" id="formFile">
		</div>
	</div>
	<br>
	<div class="form-row">
		<div id="switch" class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<input type="radio" class="btn-check" name="btnradio" id="coffeeButton" autocomplete="off" checked>
			<label class="btn btn-outline-primary" for="coffeeButton">Kawa</label>

			<input type="radio" class="btn-check" name="btnradio" id="teaButton" autocomplete="off">
			<label class="btn btn-outline-primary" for="teaButton">Herbata</label>

		</div>
	</div>

	<div id="teaDiv" hidden>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectTea">Typ herbaty</label>
				<select class="form-control" id="selectTea">
					<option selected>Wybierz typ</option>
					<option value="1">Roibos</option>
					<option value="2">Czarna</option>
					<option value="3">Pu-erh</option>
				</select>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="brewQuantity" class="form-label">Liczba parzenia</label>
				<input type="number" class="form-control" id="brewQuantity" placeholder="Wprowadź liczbę zaparzeń">
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="brewTime" class="form-label">Czas parzenia</label>
				<input type="number" class="form-control" id="brewTime" placeholder="Wprowadź czas parzenia">
			</div>

		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectTeaCountry">Typ herbaty</label>
				<select class="form-control" id="selectTeaCountry">
					<option selected>Wybierz kraj</option>
					<option value="1">Chiny</option>
					<option value="2">Japonia</option>
					<option value="3">Sri Lanka</option>
				</select>
			</div>
		</div>

	</div>

	<div id="coffeeDiv">

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectCoffee">Typ kawy</label>
				<select class="form-control" id="selectCoffee">
					<option selected>Wybierz typ</option>
					<option value="1">Klasyczna</option>
					<option value="2">aromatyzowana</option>
				</select>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectGrind">Rodzaj zmielenia</label>
				<select class="form-control" id="selectGrind">
					<option selected>Wybierz rodzaj</option>
					<option value="1">Drobno</option>
					<option value="2">Średnio</option>
				</select>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="brewQuantity" class="form-label">Data palenia</label>
				<input type="date" class="form-control" id="brewQuantity" placeholder="Wprowadź liczbę zaparzeń">
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="brewTemp" class="form-label">Temperatura parzenia</label>
				<input type="number" class="form-control" id="brewTemp" placeholder="Wprowadź temperaturę parzenia">
			</div>

		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectCoffeeCountry">Kraj pochodzenia</label>
				<select class="form-control" id="selectCoffeeCountry">
					<option selected>Wybierz kraj</option>
					<option value="1">Chiny</option>
					<option value="2">Japonia</option>
					<option value="3">Sri Lanka</option>
				</select>
			</div>
		</div>

	</div>

	<br>

	<button class="btn btn-primary" type="submit">Aktualizuj dane</button>
	
	<a href="<?= $backButton ?>"><button type="button" class="btn btn-primary">Powrót</button></a><br><br>
</form>