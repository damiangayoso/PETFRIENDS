<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';

$user = $_SESSION["user"]["user_email"];
$latitud = $_POST['reg_lat'];
$longitud = $_POST['reg_lon'];

$query_ll = "UPDATE petfriends_db.users as users
			SET users.user_lat = '$latitud',
			users.user_lon = '$longitud'
			WHERE users.user_email = '$user'";
$result = mysqli_query($conexion,$query_ll);

echo '<script>window.location="/PETFRIENDS/html/user/perfil_user.php";</script>';

?>