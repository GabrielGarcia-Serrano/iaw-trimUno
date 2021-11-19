<?php

$mysqli = new mysqli("localhost", "root", "", "tienda");
$sql = "select * from productos";
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

?>