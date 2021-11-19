<?php
session_start();
unset($_SESSION['logged_in_user_name']);
unset($_SESSION['tabla']);
unset($_SESSION['primKey']);
header("Location: usuario.php")
?>