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
		<?php foreach ($orders as $order) : ?>
			<tr>
				<td><?= $order->getId() ?></td>
				<td><?= $order->getPaymentStatus() ?></td>
				<td><?= $order->getDeliveryStatus() ?></td>
				<td><?= $order->getClientId() ?></td>
				<td><?= $order->getDelivererId() ?></td>
				<td><a href="<?= $adminURL ?>&edit=<?= $order->getId() ?>"><button class="btn btn-success">Edytuj</button></a> </td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>