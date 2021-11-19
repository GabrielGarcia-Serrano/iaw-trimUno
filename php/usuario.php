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
    <title>Usuario</title>
</head>

<body>
    <!-- Listado de los productos -->
    <div id="myTopnav" class="topnav">
        <a class="active" href="#usuario.php">Tienda</a>
        <a href="javascript:void(0);" onclick="openNav()"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito</a>
        <a href="javascript:void(0);" onclick="openLog()"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <a href="javascript:void(0);" class="icon" onclick="compresion()">
            <i class="fa fa-bars"></i>
        </a>
    </div>


    <?php
    session_start();
    if (isset($_SESSION['mal-log'])) {
        echo "<h2>Usuario y contraseña incorrectos</h2>";
        unset($_SESSION['mal-log']);
        session_write_close();
        session_start();
    }
    /* LISTA COMPRA */
    echo "<div id='mySidenav' class='sidenav'>";
        echo "<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";
        $total=0;
        $mysqli = new mysqli("localhost", "root", "", "tienda");
        foreach ($_SESSION as $index => $value) {
            echo "<h1>".$value."</h1>";
            $sql="select precio from productos where producto=\"$value\"";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
                $total=$total + $row["precio"];
            }
        }
        echo "<hr><h1>TOTAL = $total</h1>";
        /* Botones vaciar y comprar */
    ?>  <a href='vaciar.php'>
            <button type='button' class='btn btn-danger'>
                <span class='glyphicon glyphicon-remove'></span> VACIAR
            </button>
        </a>
        <a href='comprar.php'>
            <button type='button' class='btn btn-success'>
                <span class='glyphicon glyphicon-shopping-cart'></span> COMPRAR
            </button>
        </a>
    </div>

    <!-- REGISTRO DE SESIÓN -->
    <div id='sidenavLog' class='sidenav'>
        <a href='javascript:void(0)' class='closebtn' onclick='closeLog()'>&times;</a>
        <container>
            <article>
                <form method='post' action='login.php'>
                    <input type='text' id='username' name='username' placeholder='Usuario'>
                    <input type='password' placeholder='Contraseña' id='pswdlog' name='pswdlog'><br>
                    <span class='glyphicon glyphicon-eye-close' id='eyePass'></span>
                    <input type='checkbox' value='None' name='check' id='checkPass' onClick='showPassLog()'/>
                    <label for='checkPass'>View password</label><br>
                    <button type='submit' class='btn btn-primary'>
                        <span class='glyphicon glyphicon-log-in'></span> LOGIN
                    </button>
                </form>
            </article>
        </container>
    </div>

<?php 
    /* OBJETOS DISPONIBLES */
    $mysqli = new mysqli("localhost", "root", "", "tienda");
    $sql = "SELECT producto, precio, descripcion, imagen FROM productos";
    $result = $mysqli->query($sql);
    echo "<div class='container'>";
        while ($row = $result->fetch_assoc()){
            echo "<article>";
                echo "<img src=\"../imagenes/".$row["imagen"]."\" alt='Texto alternativo para la primera imagen'>";
                echo "<h4>".$row["producto"]."</h4>";
                echo "<h6>".$row["precio"]." Euros</h6>";
                echo "<p>".$row["descripcion"]."</p>";
                if (isset($_SESSION[$row["producto"]])){
                    echo "Ya está en el carrito";
                } else {
                    echo "<a href='anadir.php?Producto=".$row["producto"]."'>Añadir al carrito</a>";
                }
            echo "</article>";
        }
    echo "</div>";
    $mysqli->close();

    foreach ($_SESSION as $index => $value) {
        echo __FILE__ . __LINE__ . " $index: $value<br>";
    }
    ?>

</body>

</html>