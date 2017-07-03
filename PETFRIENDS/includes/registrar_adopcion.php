<?php
session_start();
?>

<html>
<head></head>
<body>
<?php
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
$pet_nombre = $_GET['pet_name'];
$pet_user_id = $_GET['pet_user_id'];
$user = $_SESSION["user"]["user_id"];
$email = $_SESSION["user"]["user_email"];

//obtengo info de la pet antes del cambio

$query_pet = "SELECT *
			FROM petfriends_db.pets as pets
			WHERE pets.pet_idUser = '$pet_user_id'
			AND pets.pet_name = '$pet_nombre'";
$consulta_pet = mysqli_query($conexion,$query_pet);
$pet_info = mysqli_fetch_array($consulta_pet);

$info_id = $pet_info["pet_id"];
$info_name = $pet_info["pet_name"];
$info_type = $pet_info["pet_type"];
$info_breed = $pet_info["pet_breed"];
$info_age = $pet_info["pet_age"];
$info_size = $pet_info["pet_size"];
$info_status = $pet_info["pet_status"];
$info_gender = $pet_info["pet_gender"];
$info_photo = $pet_info["pet_photo"];

//reviso si ya tiene una mascota con el mismo nombre
$query_name = "SELECT *
			FROM petfriends_db.pets as pets
			WHERE pets.pet_idUser = '$user'
			AND pets.pet_name = '$pet_nombre'";
$consulta_name = mysqli_query($conexion,$query_name);

if(mysqli_num_rows($consulta_name)>0){
	echo '<script>alert("YA TIENE UNA PET CON ESTE NOMBRE");</script>';
}
else{
$query_del = 	"DELETE FROM petfriends_db.pets
				WHERE pet_name = '$info_name'
				AND pet_idUser = '$pet_user_id'
				AND pet_id = '$info_id'";
$consulta_del = mysqli_query($conexion,$query_del);

//creo carpeta donde guardar imagen
$direccion = $raiz.'/PETFRIENDS/resources/'.$email.'/'.$info_name.'/';

if (!file_exists($direccion)) {
	mkdir($direccion, 0777, true);
}

@rename($raiz.$info_photo, $direccion.'pet_photo.png');

$direccion_2 = '/PETFRIENDS/resources/'.$email.'/'.$info_name.'/pet_photo.png';

//agrego la pet
$query_add = "INSERT INTO petfriends_db.pets (pet_idUser,pet_name,pet_type,pet_breed,pet_age,pet_size,pet_status,pet_gender,pet_photo)
			VALUES ('$user','$info_name','$info_type','$info_breed','$info_age','$info_size','$info_status','$info_gender','$direccion_2')";
$consulta_add = mysqli_query($conexion,$query_add);

//agrego como contacto la misma pet
		
$query_c = 	"SELECT *
					FROM petfriends_db.pets as pets
					WHERE pets.pet_idUser = '$user'
					AND pets.pet_name = '$info_name'";
$consulta_c = mysqli_query($conexion,$query_c);
$contact = mysqli_fetch_array($consulta_c);
$id_c = $contact["pet_id"];
		
$query_c_dos = "INSERT INTO petfriends_db.contacts(contact_userA,contact_petB)
						VALUES ('$user','$id_c')";
$result_c = mysqli_query($conexion,$query_c_dos);
		
//modifico adoptions para que no aparezca mas en la lista
$query_update = "UPDATE petfriends_db.adoptions as adoptions
				SET adoptions.adoption_status = 'ADOPTADA'
				WHERE adoptions.adoption_petId = '$info_id'
				AND adoptions.adoption_userId = '$pet_user_id'";
$consulta_update = mysqli_query($conexion,$query_update);
echo '<script>window.location="/PETFRIENDS/html/pet/adopcion.php";</script>';
}
?>
</body>
</html>