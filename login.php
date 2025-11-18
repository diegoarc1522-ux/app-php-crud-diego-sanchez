
<?php

session_start();

require 'config/db.php';
include 'includes/header.php';


if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    $correo = $_POST["correo"];
    $password = $_POST["password"];
    // var_dump($correo, $password);

    $stmt = $pdo->prepare("select * from usuarios where usuario = ?");
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario && $password == $usuario['password']){

        $_SESSION['id_usuario'] = $usuario['id_usuario']; 
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        header('Location: index.php');
        echo "Igresaste Exiosamente 😊";
    }else{
        echo "Usuario o Contraseña Incorrecta. 😒";
        
    }

}

?>

<h2>Login 🎶</h2>
<form method="POST" >
  <div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input type="email" class="form-control" id="correo" name="correo">
  </div>
    <div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password">
    </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>



<?php 
include 'includes/footer.php' 
?>

