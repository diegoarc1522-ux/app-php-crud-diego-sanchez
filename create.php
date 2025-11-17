<?php
require 'config/db.php';
include 'includes/header.php';
require 'includes/funciones.php';

// ======= CONSULTA INNER JOIN PARA LISTAR PRODUCTOS =======
$sql = "
    SELECT p.id_producto,
           p.nombre,
           p.descripcion,
           p.precio,
           p.stock,
           m.nombre AS marca,
           c.nombre AS categoria
    FROM productos p
    INNER JOIN marcas m ON p.id_marca = m.id_marca
    INNER JOIN categorias c ON p.id_categoria = c.id_categoria
";

$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ======= OBTENER DATOS PARA EL FORMULARIO =======
$categorias = obtenerCategoria($pdo);
$marcas = obtenerMarca($pdo);

// ======= GUARDAR PRODUCTO =======
if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $stock = $_POST["stock"];
    $id_marca = $_POST["id_marca"];
    $id_categoria = $_POST["id_categoria"];

    $stmt = $pdo->prepare("
        INSERT INTO productos (nombre, descripcion, precio, stock, id_marca, id_categoria) 
        VALUES (?,?,?,?,?,?)
    ");

    $stmt->execute([$nombre, $descripcion, $precio, $stock, $id_marca, $id_categoria]);

    header("Location: index.php");
    exit;
}
?>

<h2>Agregar Nuevo Producto ➕</h2>

<form method="POST" >
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
    <div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion">
  </div>
    <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio">
  </div>
    <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock">
  </div>
  <div class="mb-3">
    <label for="marca">Marca</label>
    <select name="id_marca" class="form-select" aria-label="Default select example">
      <option selected>Seleccion una Marca</option>
      <?php foreach($marcas as $item): ?>
      <option value="<?= $item['id_marca']?>"><?= $item['nombre']?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="categoria">Categoria</label>
    <select name="id_categoria" class="form-select" aria-label="Default select example">
      <option selected>Seleccione una Categoria</option>
      <?php foreach($categorias as $item): ?>
      <option value="<?= $item['id_categoria']?>"><?= $item['nombre']?></option>
      <?php endforeach; ?>
    </select>
  </div>



  <button type="submit" class="btn btn-primary">Guardar</button>
</form>




<?php
include 'includes/footer.php'
?>