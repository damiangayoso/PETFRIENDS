<?php
session_start();
?>
<html>
<head></head>
<body>
<?php

require 'base_de_datos.php';

if(isset($_POST['add_perdida'])){
	
	$email = $_SESSION["user"]["user_email"];
	$pet = $_POST['perdida_pet'];
	$id_user = $_SESSION["user"]["user_id"];
	$descripcion = $_POST['perdida_descripcion'];
	
	$query_pet = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'
					AND pts.pet_name = '$pet'";
					
	$perdida = mysqli_query($conexion,$query_pet);
	$perdida_info = mysqli_fetch_array($perdida);
	$status = "PERDIDA";

	if(mysqli_num_rows($perdida)>0){
		$id_pet = $perdida_info["pet_id"];
		$query_add = 	"INSERT INTO petfriends_db.lost_pets (lost_petId,lost_userId,lost_status,lost_description)
						VALUES ('$id_pet','$id_user','$status','$descripcion')";
		$add = mysqli_query($conexion,$query_add);
				
		echo '<script>window.location="/PETFRIENDS/html/pet/add_perdida.php";</script>';
	}
	else{
		
	}
}

?>
</body>
</html>