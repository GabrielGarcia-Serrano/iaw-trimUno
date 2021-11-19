<?php

    session_start();
    //Guardar datos en la tabla pedidos haciendo inserts en sql por las variables

    $mysqli = new mysqli("localhost", "root", "", "tienda");
    //Comprobar nº pedidos y hacer +1 para este
    $sql = "select max(idPedido) from pedidos";
    $result = $mysqli->query($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount==0){
        $numPedido=1;
    }
    else {
        $row = $result->fetch_assoc();
        $numPedido = $row["max(idPedido)"]+1;
    }
    foreach ($_SESSION as $index => $value) {
        //Obtener precio del producto
        $sql = "select precio from productos where producto = '$value';";
        echo $sql;

        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        $precio = $row["precio"]; 
        echo "$numPedido, $value, $precio";
        //Insertar producto del pedido
        $sql = "insert into pedidos (idPedido, producto, precio) values ($numPedido, '$value', $precio)";
        echo $sql;
        $mysqli->query($sql);
    }
    $mysqli->close();

    session_unset();
    header("location: usuario.php")

?>