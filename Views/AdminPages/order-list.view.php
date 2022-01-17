<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<h4>Zamówienia</h4>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Numer zamówienia</th>
			<th scope="col">Status płatności</th>
			<th scope="col">Status realizacji</th>
			<th scope="col">Klient</th>
			<th scope="col">Dostawca</th>
			<th scope="col">Akcje</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $product) : ?>
			<tr>
				<td><?= $product->getId() ?></td>
				<td><?= $product->getPaymentStatus() ?></td>
				<td><?= $product->getDeliveryStatus() ?></td>
				<td><?= $product->getClientId() ?></td>
				<td><?= $product->getDelivererId() ?></td>
				<td><a href="<?= $adminURL ?>&edit=<?= $product->getId() ?>"><button class="btn btn-success">Edytuj</button></a> <a href="<?= $adminURL ?>&remove=<?= $product->getId() ?>"><button class="btn btn-danger">Usuń</button></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>