<?php
session_start();
?>
<html>
<head></head>
<body>
<?php

require 'base_de_datos.php';

if(isset($_POST['add_adopcion'])){
	
	$email = $_SESSION["user"]["user_email"];
	$pet = $_POST['adopcion_pet'];
	$id_user = $_SESSION["user"]["user_id"];
	
	$query_pet = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'
					AND pts.pet_name = '$pet'";
					
	$adopcion = mysqli_query($conexion,$query_pet);
	$adopcion_info = mysqli_fetch_array($adopcion);
	$status = "EN ADOPCION";

	if(mysqli_num_rows($adopcion)>0){
		$id_pet = $adopcion_info["pet_id"];
		$query_add = 	"INSERT INTO petfriends_db.adoptions (adoption_petId,adoption_userId,adoption_status)
						VALUES ('$id_pet','$id_user','$status')";
		$add = mysqli_query($conexion,$query_add);
				
		echo '<script>window.location="/PETFRIENDS/html/pet/add_adopcion.php";</script>';
	}
	else{
		
	}
}

?>
</body>
</html>