<?php
    #AÑADIR PRODUCTO AL CARRITO
    $producto = $_REQUEST["Producto"];
    session_start();
    $_SESSION[$producto]=$producto;

    //session_destroy();
    header("location: usuario.php")

?>