<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/estilos.css">
<?php
echo "<table id=\"tablaCaros\" class=\"table table-striped\">";
    echo "<thead>";
        echo "<tr id=\"miTablaEficaz\">";
            echo "<th>idPedido</th>";
            echo "<th>Total</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
        $mysqli = new mysqli("localhost", "root", "", "tienda");
        $sql = "select idPedido, sum(productos.precio) as total from pedidos, productos where pedidos.producto=productos.producto group by idPedido order by total desc";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr id=\"miTablaEficaz\">";
                echo "<td>".$row["idPedido"]."</td>";
                echo "<td>".$row["total"]."</td>";
            echo "</tr>";
        }
    echo "</tbody>";
echo "</table>";
?>