<head>
	<script src="https://use.fontawesome.com/c560c025cf.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<form class="products" action="<?= $id == 0 ? $backButton : '' ?>" method="POST" enctype="multipart/form-data">
	<h3>Dodaj produkt</h3>
	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="validationTooltip03">Nazwa produktu</label>
			<input type="text" class="form-control" id="validationTooltip03" name="name" placeholder="Wprowadź nazwę produktu" value="<?= $product->getTitle() ?>" required>
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="exampleFormControlTextarea1" class="form-label">Opis produktu</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="Wprowadź opis produktu" value="<?= $product->getDescription() ?>" rows="3"></textarea>
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="productQuantity" class="form-label">Ilość sztuk w magazynie</label>
			<input type="number" class="form-control" id="productQuantity" min="0" max="100" name="quantity" value="<?= $product->getQuantity() ?>" placeholder="Wprowadź liczbę sztuk">
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="productPrice" class="form-label">Cena [zł]</label>
			<input type="number" class="form-control" id="productPrice" min="0" step="0.01" name="price" value="<?= $product->getPrice() ?>" placeholder="Wprowadź cenę produktu" required>
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="productDiscount" class="form-label">Rabat [%]</label>
			<input type="number" class="form-control" id="productDiscount" min="0" max="100" name="discount" value="<?= $product->getDiscount() ?>" placeholder="Wprowadź rabat" value="0">
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="selectWeight">Waga produktu [g]</label>
			<select class="form-control" id="selectWeight" name="weight">
				<?php foreach ($weight as $type) : ?>
					<option <?= $product->getWeight() == $type ? 'selected' : '' ?> value="<?= $type ?>"><?= $type ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="formFile" class="form-label">Dodaj zdjęcie</label>
			<input class="form-control" name="image"  type="file" id="formFile" accept="image/png">
		</div>
	</div>

	<br>
	<div class="form-row">
		<div id="switch" class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<input type="radio" class="btn-check" <?= $productType == 'tea' ? 'disabled' : '' ?> name="switch" value="coffee" id="coffeeButton" autocomplete="off" <?= $productType == 'coffee' || !$productType ? 'checked' : '' ?>>
			<label class="btn btn-outline-primary" for="coffeeButton">Kawa</label>

			<input type="radio" class="btn-check" <?= $productType == 'coffee' ? 'disabled' : '' ?> name="switch" value="tea" id="teaButton" autocomplete="off" <?= $productType == 'tea' ? 'checked' : '' ?>>
			<label class="btn btn-outline-primary" for="teaButton">Herbata</label>

		</div>
	</div>

	<div id="teaDiv" hidden>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectTea">Typ herbaty</label>
				<select class="form-control" id="selectTea" name="teaType">
					<?php foreach ($teaTypes as $type) : ?>
						<option <?= $product->getKind() == $type ? 'selected' : '' ?> value="<?= $type ?>"><?= $type ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="brewQuantity" class="form-label">Liczba zaparzeń</label>
				<input type="number" class="form-control" id="brewQuantity" name="brewQuantity" min="1" value="<?= $product->getBrewQuantity() ?>" placeholder="Wprowadź liczbę zaparzeń">
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="brewTime" class="form-label">Czas parzenia [min]</label>
				<input type="number" value="<?= $product->getBrewTime() ?>" name="brewTime" class="form-control" min="0" id="brewTime" placeholder="Wprowadź czas parzenia">
			</div>

		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectTeaCountry">Kraj pochodzenia</label>
				<select class="form-control" id="selectTeaCountry" name="teaCountry">
					<?php foreach ($countriesTea as $country) : ?>
						<option <?= $product->getIdCountry() == $country->getId() ? 'selected' : '' ?> value="<?= $country->getId() ?>"><?= $country->getName() ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>

	</div>

	<div id="coffeeDiv">

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectCoffee">Typ kawy</label>
				<select class="form-control" id="selectCoffee" name="coffeeType">
					<?php foreach ($coffeeTypes as $type) : ?>
						<option <?= $product->getKind() == $type ? 'selected' : '' ?> value="<?= $type ?>"><?= $type ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectGrind">Rodzaj zmielenia</label>
				<select class="form-control" id="selectGrind" name="grind">
					<?php foreach ($grind as $type) : ?>
						<option <?= $product->getGrind() == $type ? 'selected' : '' ?> value="<?= $type ?>"><?= $type ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="brewQuantity" class="form-label">Data palenia</label>
				<input type="date" value="<?= $product->getSmokeDate() ? $product->getSmokeDate()->format('Y-m-d') : '' ?>" max="<?= (new DateTime('now'))->format('Y-m-d') ?>" name="smokeDate" class="form-control" id="brewQuantity" placeholder="Wprowadź liczbę zaparzeń">
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="brewTemp" class="form-label">Temperatura parzenia [°C]</label>
				<input type="number" min="0" max="100" value="<?= $product->getBrewTime() ?>" name="temperature" class="form-control" id="brewTemp" placeholder="Wprowadź temperaturę parzenia">
			</div>

		</div>

		<div class="form-row">
			<div class="col-md-6 md-3">
				<label for="selectCoffeeCountry">Kraj pochodzenia</label>
				<select class="form-control" id="selectCoffeeCountry" name="coffeeCountry">
					<?php foreach ($countriesCoffee as $country) : ?>
						<option value="<?= $country->getId() ?>"><?= $country->getName() ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>

	</div>

	<br>

	<input class="btn btn-primary" type="submit" value="Aktualizuj dane"></input>
						
	<a href="<?= $backButton ?>"><button type="button" class="btn btn-primary">Powrót</button></a><br><br>
</form>