<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
if(isset($_SESSION["user"])){
	echo '';
}
else{
	echo '<script>window.location="../../index.php";</script>'; //si intentan entrar a editar.php sin logear los redirige a index.php
}
require 'base_de_datos.php';

$editNombre = $_POST['edit_nombre'];
$editApellido = $_POST['edit_apellido'];
$editTel = $_POST['edit_telefono'];
$editFecha = $_POST['edit_fecha'];
$editGenero = $_POST['x'];
$editUbic = $_POST['edit_direccion'];
$id_usuario = $_SESSION["user"]["user_id"];
$user_email = $_SESSION["user"]["user_email"];
if ($editNombre == "")
{
	echo 'el nombre es vacio';
	echo '';
}
else
{
	$sql = "UPDATE petfriends_db.users as users SET users.user_firstName = '$editNombre'
    WHERE users.user_id = '$id_usuario'";
    $result = mysqli_query($conexion,$sql);
    echo 'hizo el update de nombre';
    echo '';
 }	
 
if ($editApellido == "")
	{
	echo 'el apellido es vacio';
	echo '';
	}
else
{
	$sql = "UPDATE petfriends_db.users as users SET users.user_lastName = '$editApellido'
    WHERE users.user_id = '$id_usuario'";
    $result = mysqli_query($conexion,$sql);
    echo 'hizo el update de apellido';
    echo '';
 }	
  
if ($editTel == "")
	{
	echo 'el telefono es vacio';
	echo '';
	}
else
{
	$sql = "UPDATE petfriends_db.users as users SET users.user_phone = '$editTel'
    WHERE users.user_id = '$id_usuario'";
    $result = mysqli_query($conexion,$sql);
    echo 'hizo el update de telefono';
    echo '';
 }	

if ($editFecha == "") 
	{
	echo 'el nacimiento es vacio';
	echo '';
	}
else
{
	$sql = "UPDATE petfriends_db.users as users SET users.user_birthdate = '$editFecha'
    WHERE users.user_id = '$id_usuario'";
    $result = mysqli_query($conexion,$sql);
    echo 'hizo el update de nacimiento';
 	echo '';
}
if ($editGenero == "") 
	{
	echo 'el genero es vacio';
	echo '';
	}
else
{
	$sql = "UPDATE petfriends_db.users as users SET users.user_gender = '$editGenero'
    WHERE users.user_id = '$id_usuario'";
    $result = mysqli_query($conexion,$sql);
    echo 'hizo el update de genero';
 	echo '';
}
//INICIO IMAGEN
$img_nombre = $_FILES['edit_photo']['name'];
$img_tipo = $_FILES['edit_photo']['type'];
$img_tamano = $_FILES['edit_photo']['size'];

$filtro_jpg = strpos($img_nombre,".jpg");
$filtro_png = strpos($img_nombre,".png");
$filtro_jpeg = strpos($img_nombre,".jpeg");
if($filtro_jpg ||  $filtro_png ||  $filtro_jpeg){
		$directorio = $raiz.'/PETFRIENDS/resources/'.$user_email.'/';

		if (!file_exists($directorio)) {
			mkdir($directorio, 0777, true);
		}
		move_uploaded_file($_FILES['edit_photo']['tmp_name'],$directorio."photo_perfil.png");
		$url_imagen = "/PETFRIENDS/resources/".$user_email."/photo_perfil.png";
		$sql = "UPDATE petfriends_db.users as users SET users.user_photo = '$url_imagen'
		WHERE users.user_id = '$id_usuario'";
		$result = mysqli_query($conexion,$sql);
		echo 'hizo el update de imagen';
		echo '';
}
else{
	echo'NO ES UNA IMAGEN JPG PNG';
}

//FIN IMAGEN
echo '<script type="text/javascript" language="javascript"> window.close()</script>';  
?>
