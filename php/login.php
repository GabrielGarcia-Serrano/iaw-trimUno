<!-- Login de administración -->
<?php
session_start();
$username=$_REQUEST['username'];
$password=$_REQUEST['pswdlog'];
if ($username == "gabriel" && $password == "123"){
    $_SESSION['logged_in_user_name']="$username";
    $_SESSION['tabla']="productos";
    header("Location: admin.php");
} else {
    $_SESSION['mal-log']='no ok';
    header("Location: usuario.php");
}

?>
