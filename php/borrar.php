<?php
    /* BORRAR DATOS DE UNA TABLA */
    $identificador = $_REQUEST["id"]; // Ejemplo: delete.php?id=3
    session_start();
    $tabla=$_SESSION['tabla'];
    $primKey=$_SESSION['primKey'];

    $mysqli = new mysqli("localhost", "root", "", "tienda");
    $sql = "DELETE FROM ".$tabla." WHERE ".$primKey." = \"".$identificador."\"";
    $mysqli->query($sql);
    $mysqli->close();
    
    // Redirecciona a otro sitio
    header("location: admin.php?tabla=".$tabla);
?>