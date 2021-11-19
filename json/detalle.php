<?php

if (isset($_REQUEST['id'])) {
    $identifier = $_REQUEST['id'];
    $mysqli = new mysqli("localhost", "root", "", "tienda");
    $sql = "select * from productos where producto=\"$identifier\"";
    $result = $mysqli->query($sql);

    $devolver = array();

    while ($row = $result->fetch_assoc()) {
      $devolver[$row['producto']] = array (
        'precio' => $row['precio'],
        'descripcion' => $row['descripcion']
      );
      //$devolver[] = $row;
    }

    $mysqli->close();

    header('Content-Type: application/json');
    echo json_encode($devolver);
} else {
    $devolver = array();
    $devolver[] = "No has especificado el id";
    header('Content-Type: application/json');
    echo json_encode($devolver);
}



?>