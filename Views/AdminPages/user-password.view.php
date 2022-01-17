<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<form method="POST">
	<h3>Zmiana hasła</h3>
	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="validationTooltip03">Obecne hasło</label>
			<input type="password" class="form-control" name="current" id="validationTooltip03" placeholder="Wprowadź obecne hasło" required>
			<div class="invalid-tooltip">
				Please provide a valid city.
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="validationTooltip03">Nowe hasło</label>
			<input type="password" class="form-control" name="new" id="validationTooltip03" placeholder="Wprowadź nowe hasło" required>
			<div class="invalid-tooltip">
				Please provide a valid city.
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-6 md-3">
			<label for="validationTooltip03">Powtórz hasło</label>
			<input type="password" class="form-control" name="repeat" id="validationTooltip03" placeholder="Powtórz nowe hasło" required>
			<div class="invalid-tooltip">
				Please provide a valid city.
			</div>
		</div>
	</div>

	<input class="btn btn-primary" type="submit" value="Aktualizuj dane"></input>
	<a href="<?= $backButton ?>"><button type="button" class="btn btn-primary">Powrót</button></a><br><br>
</form>