<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script  src="../js/scripts.js"></script>
    <title>Base de datos</title>
</head>
<body>
    <!-- Topnav -->
    <div id="myTopnav" class="topnav">
        <?php
        session_start();
        echo "<a class='active' href='#'>".$_SESSION['logged_in_user_name']."</a>";
        ?>
        <a href="javascript:void(0);" onclick="openTables()"><span class="glyphicon glyphicon-th-list"></span> Tablas</a>
        <a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log-out</a>
        <a href="javascript:void(0);" class="icon" onclick="compresion()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div id='tablas' class='sidenav'>
        <a href='javascript:void(0)' class='closebtn' onclick='closeTables()'>&times;</a>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "tienda");
        $sql = "show tables";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<a href='admin.php?tabla=".$row["Tables_in_tienda"]."'>".$row["Tables_in_tienda"]."</a>";
        }
        ?>
    </div>
    
    <?php
    if (isset($_REQUEST['tabla'])) {
        $tabla = $_REQUEST['tabla'];
        $_SESSION["tabla"]=$tabla;
    } else {
        $tabla = "productos";
        $_SESSION["tabla"]=$tabla;
    }
    /* Body donde se cambian los datos */
    if ($tabla == "productos") {
        /* inputs y labels de cambios */
        ?>
        <div class="container">
        <article>
            <form method="POST" action="modificar.php">
                <br><label for id="producto">Producto: </label>
                <input type="text" name="producto" id="producto"><br>
                <br><label for id="precio">Precio: </label>
                <input type="int" name="precio" id="precio"><br>
                <br><label for id="descripcion">Descripcion: </label>
                <input type="text" name="descripcion" id="descripcion"><br>
                <br><label for id="imagen">Imagen: </label>
                <input type="text" name="imagen" id="imagen"><br><br>
                <button type="submit" class='btn btn-primary' value="Enviar">Nuevo producto</button>
            </form>
        </article>
        </div>
        <?php
    }
    /* Título de la tabla */
    echo "<h1>$tabla</h1>";
    ?>
    <!-- Body donde se muestra el contenido de la tabla -->
    <?php
    if ($tabla == "pedidos") {
        echo "<div id='precios'>";
            echo "<button type=\"button\" class='btn btn-info' onClick='mostrarCaros()'>Mostrar caros</button>";
        echo"</div>";
    }
    ?>
    <div style="overflow-x:auto">
        <table class="table table-striped">
            <thead>
                <tr id="miTablaEficaz">
                    <?php
                    $sql = "show columns from ".$tabla;
                    $result = $mysqli->query($sql);
                    $nombreColumnas=array();
                    while ($row = $result->fetch_assoc()) {
                        echo "<th>".$row["Field"]."</th>";
                        $nombreColumnas[]=$row["Field"];
                    }
                    $_SESSION["primKey"]=$nombreColumnas[0];
                    ?>
                    <th>Borrar</th>
                    <?php
                    if ($tabla == "productos") {
                        echo "<th>Modificar</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($tabla == "pedidos" ) {
                    $sql = "select * from $tabla order by idPedido desc";
                } else {
                    $sql = "select * from ".$tabla;
                }
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr id=\"miTablaEficaz\">";
                    if (isset($_REQUEST["id"]) && $_REQUEST["id"] == $row[$nombreColumnas[0]] && $tabla=="productos"){
                        echo "<form method='get' action='modificar.php'>";
                            echo "<td><input type='text' id='producto' name='producto' value='".$row[$nombreColumnas[0]]."' readonly='readonly'></td>";
                            echo "<td><input type='int' id='precio' name='precio' value='".$row[$nombreColumnas[1]]."'></td>";
                            echo "<td><input type='text' id='descripcion' name='descripcion' value='".$row[$nombreColumnas[2]]."'></td>";
                            echo "<td><input type='text' id='imagen' name='imagen' value='".$row[$nombreColumnas[3]]."'></td>";
                            echo "<td><a href='borrar.php?id=".$row[$nombreColumnas[0]]."'><button type='button' class='btn btn-danger'>Borrar</button></a></td>";
                            echo "<td><a><button type='submit' class='btn btn-success'>Modificar</button></a></td>";
                        echo "</form>";
                    }
                    else {
                        for ($i = 0; $i < count($nombreColumnas); $i++) {
                            echo "<td>".$row[$nombreColumnas[$i]]."</td>";
                        }
                        /* MIRAR a href xxxx.php del modificar */
                        echo "<td><a href='borrar.php?id=".$row[$nombreColumnas[0]]."'><button type='button' class='btn btn-danger'>Borrar</button></a></td>";
                        if ($tabla == "productos") {
                            echo "<td><a href='admin.php?tabla=$tabla&id=".$row[$nombreColumnas[0]]."'><button type='button' class='btn btn-warning'>Modificar</button></a></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php $mysqli->close(); ?>
</body>
</html>