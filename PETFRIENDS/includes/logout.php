<?php
session_start();
session_destroy(); //destruye la sesion actual y redirige a index.php
$_SESSION["error_usuario"] = 0;
echo '<script>window.location="../index.php";</script>';
?>