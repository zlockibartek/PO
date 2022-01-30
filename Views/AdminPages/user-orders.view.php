<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<h4>Zamówienia</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data zamówienia</th>
      <th scope="col">Data płatności</th>
      <th scope="col">Kwota</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($orders as $order): ?>
  <tr>
      <td>15:22 12-11-2021</td>
      <td><?= $order->getPaymentDate() ? $order->getPaymentDate()->format('Y-m-d') : '' ?> </td>
      <td><?= $order->getPrice() ?> zł</td>
      <td>W trakcie realizacji</td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>
<a href="<?= $backButton ?>"><button type="button" class="btn btn-primary">Powrót</button></a><br><br>
