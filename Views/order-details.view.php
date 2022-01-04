<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<h4>Zamówienie numer 1</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa produktu</th>
      <th scope="col">Typ</th>
      <th scope="col">Waga</th>
      <th scope="col">Ilość</th>
      <th scope="col">Kwota</th>
    </tr>
  </thead>
  <tbody>
	<?php var_dump($results) ?>

  <tr>
      <th scope="row">1</th>
      <td>Ogród różany</td>
      <td>Herbata</td>
      <td>100g</td>
      <td>2</td>
      <td>24zł</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Costa puerto</td>
      <td>Kawa</td>
      <td>50g</td>
      <td>1</td>
      <td>36zł</td>
    </tr>
  </tbody>
</table>
<p>Łączna kwota: 60zł</p>
<a href="<?= $backButton ?>"><button type="button" class="btn btn-primary">Powrót</button></a><br><br>
