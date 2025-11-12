<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basico 🎶</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2 class="" style="color: green;">Diego Sanchez</h2>
    <h1>PHP Basico</h1> 
    <hr>     <!--Crea una linea de separacion -->
    <section>
        <h2>Variables</h2>
    <?php
        $nombre = "Diego Sanchez 🎶 <br>"; //PHP
        //String nombre = "Diego Sanchez"; //JAVA
        //nombre = "Diego Sanchez" //PYTHON 
        echo "Nombre: " .$nombre ."<br>"; 
        $edad = 30;
        echo "Edad: " .$edad ."<br>";

        $profesor = true;
        echo "Es Profesor: " .$profesor ."<br>";

        $talla =1.70;
        echo "Edad: " .$talla ."<br>"
      ?>

    <h2>Constantes</h2>
    <?php
        define("PI",3.14159265);
        echo  "El valor de PI es: " .PI ."<br>";   
    ?>
    </section>
    <hr>
    <section>
        <h2 class="" style="color: red;">Operadores</h2>
            <h3>Operadores Logicos</h3>
            <h3>Operadores de Asignacion</h3>
            <h3>Operadores Aritmeticos</h3>
            <h3>Operadores Incremento y Decremento</h3>
    </section>
    <hr>
    <section>
        <h2 class="" style="color: red;">Control de flujo</h2>
            <h3>IF - ELSE</h3>
            <?php
            date_default_timezone_set("America/Lima");
            $hora_limite = new DateTime('14:15:00');
            $hora_actual = new DateTime();

            if ($hora_actual > $hora_limite) {
                echo "Es salida...<br>";
            } else {
                echo "Sigue en clases...<br>";
            }
            ?>
            
            <?php 
            /*
            date_default_timezone_set("America/Lima");
            $hora_actual = date('H:i');
            $hora_limite = "10:15";
            if ($hora_actual > $hora_limite) {
                echo "Es salida...<br>";
            } else {
                echo "Sigue en clases...<br>";
            }*/
            ?> 
            

        <h3>IF ELSEIF ELSE</h3>
        <h3>SWITCH</h3>
    </section>
    <section>
        <h2 class="" style="color: red;">BUCLES</h2>
        <h3>FOR</h3>
        <h3>WHILE</h3>
        <h3>FOR-EACH</h3>
    </section>
    <hr>
    <section>
        <h2 class="" style="color: red;">Funciones</h2>
            <h3>Funciones con Parametros</h3>
            <h3>Funciones con retorno</h3>
        <h2 class="" style="color: red;">Arreglos</h2>
         <h3>Arreglo Indexado</h3>
         <h3>Arreglo Asociativos</h3>
    </section>

</body>
</html>