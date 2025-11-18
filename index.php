
<?php
require 'config/db.php';
include 'includes/header.php';

// CONSULTA CON JOIN PARA TRAER NOMBRES
$stmt = $pdo->query("
    SELECT p.*,
           m.nombre AS marca,
           c.nombre AS categoria
    FROM productos p
    LEFT JOIN marcas m ON p.id_marca = m.id_marca
    LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
    ORDER BY p.fecha_creacion DESC
");

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
      <th scope="col">Marca</th>
      <th scope="col">Categoria</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($productos as $item): ?>
    <tr>
      <th scope="row"><?= $item["id_producto"] ?></th>
      <td><?= $item["nombre"] ?></td>
      <td><?= $item["descripcion"] ?></td>
      <td><?= $item["precio"] ?></td>
      <td><?= $item["stock"] ?></td>

      <!-- AHORA MUESTRA NOMBRE -->
      <td><?= $item["marca"] ?></td>
      <td><?= $item["categoria"] ?></td>

      <td>
        <div style="display: flex;">
          <a href="delete.php?id_producto=<?= $item["id_producto"] ?>" 
             type="button" 
             class="mx-2 btn btn-outline-danger">🗑️</a>

          <a href="" 
             type="button" 
             class="mx-2 btn btn-outline-info">🖋️</a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php 
include 'includes/footer.php' 
?>