<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<a href="<?= $adminURL ?>&edit=0"><button class="btn btn-primary">Dodaj produkt</button></a>
<h4>Produkty</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nazwa produktu</th>
      <th scope="col">Typ</th>
      <th scope="col">Waga</th>
      <th scope="col">Ilość</th>
      <th scope="col">Cena jednostkowa [zł]</th>
      <th scope="col">Akcje</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product): ?>
  <tr>
      <td><?= $product->getTitle() ?></td>
      <td><?= $product->getKind() ?></td>
      <td><?= $product->getWeight() ?></td>
      <td><?= $product->getQuantity() ?></td>
      <td><?= $product->getPrice() ?></td>
      <td><a href="<?= $adminURL ?>&edit=<?= $product->getId() ?>"><button class="btn btn-success">Edytuj</button></a> <a href="<?= $adminURL ?>&remove=<?= $product->getId() ?>"><button class="btn btn-danger">Usuń</button></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
