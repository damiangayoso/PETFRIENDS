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


$petNombre = $_POST['reg_pet_nombre'];
$petTipo = $_POST['tipo'];
$petRaza = $_POST['raza'];
$petEdad = $_POST['reg_pet_edad'];
$petTamano = $_POST['reg_pet_tamano'];
$petSexo = $_POST['pet_sexo_options'];
$id_usuario = $_SESSION["user"]["user_id"];
$user_email = $_SESSION["user"]["user_email"];
$img_nombre = $_FILES["pet_foto_perfil"]["name"];
$img_tipo = $_FILES["pet_foto_perfil"]["type"];
$img_tamano = $_FILES["pet_foto_perfil"]["size"];

//busco si el dueño ya tiene una pet con el mismo nombre
$query_name = "SELECT *
				FROM petfriends_db.pets as pets
				WHERE pets.pet_name = '$petNombre'
				AND pets.pet_idUser = '$id_usuario'";
$consulta_name = mysqli_query($conexion,$query_name);

if(mysqli_num_rows($consulta_name)<1){
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
		$query_reg = "	INSERT INTO pets 	(pet_idUser,pet_name,pet_type,pet_breed,pet_age,pet_size,pet_gender,pet_photo,pet_status) 
						VALUES	('$id_usuario','$petNombre','$petTipo','$petRaza','$petEdad','$petTamano','$petSexo','$url_imagen','Con Dueño')";

		$result = mysqli_query($conexion,$query_reg) or die ("ERROR AL INSERTAR") ;
	
		//agrego como contacto la misma pet
		
		$query_c = 	"SELECT *
					FROM petfriends_db.pets as pets
					WHERE pets.pet_idUser = '$id_usuario'
					AND pets.pet_name = '$petNombre'";
		$consulta_c = mysqli_query($conexion,$query_c);
		$contact = mysqli_fetch_array($consulta_c);
		echo 'sadsa'.$contact["pet_name"];
		$id_c = $contact["pet_id"];
		
		$query_c_dos = "INSERT INTO petfriends_db.contacts(contact_userA,contact_petB)
						VALUES ('$id_usuario','$id_c')";
		$result_c = mysqli_query($conexion,$query_c_dos);
		
}	
}
header ('location: /PETFRIENDS/html/user/perfil_user.php');

?>