<?php
session_start();
?>
<html>
<head></head>
<body>
<?php

require 'base_de_datos.php';

if(isset($_POST['add_cita'])){
	
	$email = $_SESSION["user"]["user_email"];
	$pet_cita_id = $_GET['pet_id'];
	$pet = $_POST['cita_pet'];
	$id_user = $_SESSION["user"]["user_id"];
	
	$query_pet = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'
					AND pts.pet_name = '$pet'";
					
	$cita = mysqli_query($conexion,$query_pet);
	$cita_info = mysqli_fetch_array($cita);

	if(mysqli_num_rows($cita)>0){
		$id_pet = $cita_info["pet_id"];
		$query_add = 	"INSERT INTO petfriends_db.dates (date_petA,date_petB)
						VALUES ('$id_pet','$pet_cita_id')";
		$add = mysqli_query($conexion,$query_add);
				
		echo '<script>window.location="/PETFRIENDS/html/pet/cruce.php";</script>';
	}
	else{
		
	}
}

?>
</body>
</html>