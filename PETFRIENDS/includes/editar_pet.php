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

$petNombre = $_GET['pet_name'];
$petTipo = $_POST['tipo'];
$petRaza = $_POST['raza_m'];
$petEdad = $_POST['edit_pet_edad'];
$petTamano = $_POST['edit_pet_tamano'];
$petSexo = $_POST['pet_sexo_options'];
$id_usuario = $_SESSION["user"]["user_id"];
$user_email = $_SESSION["user"]["user_email"];
$img_nombre = $_FILES["pet_foto_perfil"]["name"];
$img_tipo = $_FILES["pet_foto_perfil"]["type"];
$img_tamano = $_FILES["pet_foto_perfil"]["size"];

if ($petTipo == "")
{}
else
{
	$sql = "UPDATE petfriends_db.pets as pets SET pets.pet_type = '$petTipo'
    WHERE pets.pet_idUser = '$id_usuario'
	AND pets.pet_name = '$petNombre'";
    $result = mysqli_query($conexion,$sql);
}	
if ($petRaza == "")
{}
else
{
	$sql = "UPDATE petfriends_db.pets as pets SET pets.pet_breed = '$petRaza'
    WHERE pets.pet_idUser = '$id_usuario'
	AND pets.pet_name = '$petNombre'";
    $result = mysqli_query($conexion,$sql);
}	
if ($petEdad == "")
{}
else
{
	$sql = "UPDATE petfriends_db.pets as pets SET pets.pet_age = '$petEdad'
    WHERE pets.pet_idUser = '$id_usuario'
	AND pets.pet_name = '$petNombre'";
    $result = mysqli_query($conexion,$sql);
}
if ($petTamano == "")
{}
else
{
	$sql = "UPDATE petfriends_db.pets as pets SET pets.pet_size = '$petTamano'
    WHERE pets.pet_idUser = '$id_usuario'
	AND pets.pet_name = '$petNombre'";
    $result = mysqli_query($conexion,$sql);
}	
if ($petSexo == "")
{}
else
{
	$sql = "UPDATE petfriends_db.pets as pets SET pets.pet_gender = '$petSexo'
    WHERE pets.pet_idUser = '$id_usuario'
	AND pets.pet_name = '$petNombre'";
    $result = mysqli_query($conexion,$sql);
}	
//detalles para el insert de la imagen
$filtro_jpg = strpos($img_nombre,".jpg");
$filtro_png = strpos($img_nombre,".png");
$filtro_jpeg = strpos($img_nombre,".jpeg");
if($filtro_jpg ||  $filtro_png || $filtro_jpeg)
{
		$directorio = $raiz.'/PETFRIENDS/resources/'.$user_email.'/'.$petNombre.'/';

		if (!file_exists($directorio)) 
		{
			mkdir($directorio, 0777, true);
		}
		move_uploaded_file($_FILES['pet_foto_perfil']['tmp_name'],$directorio."photo_perfil.png");
		$url_imagen = "/PETFRIENDS/resources/".$user_email."/".$petNombre."/"."photo_perfil.png";
		$query_img = "	UPDATE petfriends_db.pets as pets SET pets.pet_photo = '$url_imagen' 
						WHERE pets.pet_idUser = '$id_usuario'
						AND pets.pet_name = '$petNombre'";

		$result = mysqli_query($conexion,$query_img) or die ("ERROR AL INSERTAR") ;
			
}	

echo '<script type="text/javascript" language="javascript"> window.close()</script>';  

?>