
<?php
require 'config/db.php';
include 'includes/header.php';

$stmt = $pdo->query("select * from productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($productos);
?>

<h2>PRODUCTOS</h2>
<hr>
<h2>Gestion de Productos</h2>
<a href="create.php" type="button" class="btn btn-outline-success">➕ Nuevo Producto</a>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($productos as $item): ?>
    <tr>
      <th scope="row"> <?= $item["id_producto"] ?></th>
      <td><?= $item["nombre"]?></td>
      <td><?= $item["descripcion"]?></td>
      <td><?= $item["precio"]?></td>
      <td><?= $item["stock"]?></td>
      <td>
        <div style="display: flex;">
          <a href="delete.php?id_producto=<?= $item["id_producto"] ?>" type="button" class="mx-2 btn btn-outline-danger">🗑️</a>
          <a href="" type="button" class="mx-2 btn btn-outline-info">🖋️</a>
        </div>
      </td>
    </tr>
     <?php endforeach; ?>
  </tbody>
</table>




<?php
include 'includes/footer.php'
?>