<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "tienda");
$tabla=$_SESSION['tabla'];
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    #echo 'Llega algo por GET. Eso quiere decir que es un update';
    $primKey=$_SESSION['primKey'];
    $sql="";
    if ($tabla == "productos" && filter_var($_REQUEST['precio'],FILTER_VALIDATE_INT)) {
        $sql = "update $tabla set precio=".$_REQUEST['precio'].", descripcion=\"".$_REQUEST['descripcion']."\", imagen=\"".$_REQUEST['imagen']."\" where producto=\"".$_REQUEST['producto']."\"";
    } 
    if ($sql != "") { $mysqli->query($sql); }
} else {
    #echo 'Llega algo por POST. Eso quiere decir que es un insert';
    if (filter_var($_REQUEST['precio'],FILTER_VALIDATE_INT)) {
        $sql = "Insert into $tabla values (\"".$_REQUEST['producto']."\", ".$_REQUEST['precio'].", \"".$_REQUEST['descripcion']."\", \"".$_REQUEST['imagen']."\")";
        $mysqli->query($sql);
    }
}
$mysqli->close();
header("location: admin.php?tabla=".$tabla);
?>