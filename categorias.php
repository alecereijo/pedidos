<?php
//comprueba que el usuario haya abierto sesión o redirige/ 
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de categorías</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../scss/style.scss">
    <script src="src/components/header.js" type="text/javascript" defer></script>
    <script src="src/components/footer.js" type="text/javascript" defer></script>
</head>
<body>
<header-component></header-component>

    <?php require 'cabecera.php';?>
    <h1>Lista de categorías</h1>
    <!--lista de vínculos con la forma de productos.php?categoria=1-->
    <?php
    $categorias = cargar_categorias();
    if($categorias===FALSE){
        echo "<p class='error'>Error al conectar con la base de datos</p>";
    }else{
        echo "<ul>"; //abrir la lista
        foreach($categorias as $cat){
            //$cat['nombre] $cat['codCat']/
            $url = "productos.php?categoria=".$cat['codCat'];
            echo "<li><a href='$url'>".$cat['nombre']."</a></li>";
        }
        echo "</ul>";
    }
    ?>
    <footer-component></footer-component>
</body>
</html>