<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<form method="POST" action="">
	<h4>Rejestracja</h4>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="name">Login</label>
			<input type="text" class="form-control-plaintext" id="name" name="login"  required>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="email">Email</label>
			<input type="text" class="form-control-plaintext" id="email" name="email"  required>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="password">Hasło</label>
			<input type="password" class="form-control-plaintext" id="password" name="password"  required>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="username">Imię</label>
			<input type="text" class="form-control-plaintext" id="username" name="username"  required>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-4 mb-3">
			<label for="surname">Nazwisko</label>
			<input type="text" class="form-control-plaintext" id="surname" name="surname"  required>
		</div>
	</div>

	<input class="btn btn-primary" type="submit" value="Zarejestruj"></input>
</form>