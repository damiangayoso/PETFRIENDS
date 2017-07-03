<?php 
session_start();
?>
<html>
<head></head>
<body>
<?php
	$raiz = $_SERVER['DOCUMENT_ROOT'];
	require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
	
	$user = $_SESSION["user"]["user_id"];
	$pet_nombre = $_GET['pet_name'];
	$pet_user_id = $_GET['user_pet_id'];
	
	$query_pet = 	"SELECT *
					FROM petfriends_db.pets as pets
					WHERE pets.pet_name = '$pet_nombre'
					AND pets.pet_idUser = '$pet_user_id'";
					
	$consulta_pet = mysqli_query($conexion,$query_pet);
	$pet = mysqli_fetch_array($consulta_pet);
	$pet_id = $pet["pet_id"];
	
	$query_seguir = "INSERT INTO petfriends_db.contacts (contact_userA,contact_petB)
							VALUES ('$user','$pet_id')";
	$consulta_seguir = mysqli_query($conexion,$query_seguir);
	echo '<script>window.location="/PETFRIENDS/html/pet/other_perfil_pet.php?pet_name=',$pet_nombre,'&user_pet_id=',$pet_user_id,'";</script>';
?>
</body>
</html>