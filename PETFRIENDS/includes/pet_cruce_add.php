<?php
session_start();
?>
<html>
<head></head>
<body>
<?php

require 'base_de_datos.php';

if(isset($_POST['add_cruce'])){
	
	$email = $_SESSION["user"]["user_email"];
	$pet = $_POST['cruce_pet'];
	$id_user = $_SESSION["user"]["user_id"];
	
	$query_pet = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'
					AND pts.pet_name = '$pet'";
					
	$cruce = mysqli_query($conexion,$query_pet);
	$cruce_info = mysqli_fetch_array($cruce);
	$status = "DISPONIBLE";

	if(mysqli_num_rows($cruce)>0){
		$id_pet = $cruce_info["pet_id"];
		$query_add = 	"INSERT INTO petfriends_db.crosses (cross_petId,cross_userId,cross_status)
						VALUES ('$id_pet','$id_user','$status')";
		$add = mysqli_query($conexion,$query_add);
				
		echo '<script>window.location="/PETFRIENDS/html/pet/cruce.php";</script>';
	}
	else{
		
	}
}

?>
</body>
</html>