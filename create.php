<?php
require 'config/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $stock = $_POST["stock"];

    $stmt = $pdo->prepare("INSERT INTO PRODUCTOS (nombre, descripcion, precio, stock) VALUES (?,?,?,?)");
    $stmt->execute([$nombre, $descripcion, $precio, $stock]);

    header("Location: index.php");
    exit;

    //para capturar datos: echo, var_dump, die, dd
    //var_dump($nombre, $precio, $descripcion, $stock);

}else{

}

?>

<h2>Agregar Nuevo Producto ➕</h2>
<br>
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
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>




<?php
include 'includes/footer.php'
?>