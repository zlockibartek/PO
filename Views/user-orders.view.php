<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<h4>Zamówienia</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data zamówienia</th>
      <th scope="col">Data dostarczenia</th>
      <th scope="col">Kwota</th>
      <th scope="col">Status</th>
      <th scope="col">Szczegóły</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">1</th>
      <td>15:22 12-11-2021</td>
      <td> - </td>
      <td>105,20 zł</td>
      <td>W trakcie realizacji</td>
      <td><a href="<?= $backButton . '?action=details' ?>"><button type="button" class="btn btn-primary">Zobacz</button></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>15:22 11-11-2021</td>
      <td>15:22 13-11-2021</td>
      <td>105,20 zł</td>
      <td>Dostarczone</td>
      <td><a href="<?= $backButton . '?action=details' ?>"><button type="button" class="btn btn-primary">Zobacz</button></a></td>
    </tr>
  </tbody>
</table>
<a href="<?= $backButton ?>"><button type="button" class="btn btn-primary">Powrót</button></a><br><br>
