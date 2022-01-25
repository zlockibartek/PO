
<form class="orders"  method="POST">
  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="order">Status paczki</label>
			<select class="form-control" id="order" name="order">
				<?php foreach ($orderOptions as $index => $option) : ?>
					<option <?= $option == $order->getOrderStatus() ? 'selected' : '' ?> value="<?= $option ?>"><?= $option ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>

  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="delivery">Status zamówienia</label>
			<select class="form-control" id="delivery" name="delivery">
				<?php foreach ($deliveryOptions as $index => $option) : ?>
					<option <?= $option == $order->getDeliveryStatus() ? 'selected' : '' ?> value="<?= $option ?>"><?= $option ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>

  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="payment">Status płatności</label>
			<select class="form-control" id="payment" name="payment">
				<?php foreach ($paymentOptions as $index => $option) : ?>
					<option <?= $option == $order->getPaymentStatus() ? 'selected' : '' ?> value="<?= $option ?>"><?= $option ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
          <br>
  <div class="form-row" hidden>
		<div class="col-md-6 md-3">
			<label for="paymentDate">Data płatności</label>
			<input type="date" max="<?= (new DateTime('now'))->format('Y-m-d') ?>" value="<?= $order->getPaymentDate() ? $order->getPaymentDate()->format('Y-m-d') : '' ?>" name="paymentDate">
		</div>
	</div>

  <br>

  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="username">Imię</label>
			<input type="text" class="form-control" id="username" name="username"  value="<?= $user['name'] ?>" disabled>
		</div>
	</div>

  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="surname">Nazwisko</label>
			<input type="text" class="form-control" id="surname" name="surname"  value="<?= $user['surname'] ?>" disabled>
		</div>
	</div>

  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="nip">NIP</label>
			<input type="text" class="form-control" id="nip" name="nip"  value="<?= $user['nip'] ?>" disabled>
		</div>
	</div>

  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="tax">Stawka VAT</label>
			<input type="text" class="form-control" id="tax" name="tax"  value="<?= $user['tax'] ?>" disabled>
		</div>
	</div>

  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="userDate">Data wystawienia</label>
			<input type="text" class="form-control" id="userDate" name="userDate"  value="<?= $user['userDate'] ?>" disabled>
		</div>
	</div>

  <div class="form-row">
		<div class="col-md-6 md-3">
			<label for="deliverer">Nazwa kuriera</label>
			<input type="text" class="form-control" id="deliverer" name="deliverer"  value="<?= $deliverer ?>" disabled>
		</div>
	</div>

  
	<input class="btn btn-primary" type="submit" value="Aktualizuj dane"></input>
	<a class="btn btn-primary" href="<?= $backButton ?>">Powrót</a>					
</form>