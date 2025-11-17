<?php 

function obtenerCategoria($pdo){
    $stmt = $pdo->query("select * from categorias");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerMarca($pdo){
    $stmt = $pdo->query("select * from marcas");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>