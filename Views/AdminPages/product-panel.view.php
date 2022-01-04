<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<br>
<br>
<a href="<?= $adminURL ?>&action=add"><button class="btn btn-primary">Dodaj produkt</button></a>
<h4>Produkty</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa produktu</th>
      <th scope="col">Typ</th>
      <th scope="col">Waga</th>
      <th scope="col">Ilość</th>
      <th scope="col">Kwota</th>
      <th scope="col">Akcje</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">1</th>
      <td>Ogród różany</td>
      <td>Herbata</td>
      <td>100g</td>
      <td>2</td>
      <td>24zł</td>
      <td><a href="<?= $adminURL ?>&action=edit"><button class="btn btn-success">Edytuj</button></a> <a href="&action=delete"><button class="btn btn-danger">Usuń</button></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Costa puerto</td>
      <td>Kawa</td>
      <td>50g</td>
      <td>1</td>
      <td>36zł</td>
      <td><a href="<?= $adminURL ?>&action=edit"><button class="btn btn-success">Edytuj</button></a> <a href="&action=delete"><button class="btn btn-danger">Usuń</button></a></td>
    </tr>
  </tbody>
</table>
<p>Łączna kwota: 60zł</p>
