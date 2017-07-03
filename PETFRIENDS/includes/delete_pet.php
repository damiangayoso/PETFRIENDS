<?php
session_start();
?>
<html>
<head></head>
<body>
<?php

require 'base_de_datos.php';

if(isset($_POST['delete'])){
	$email = $_SESSION["user"]["user_email"];
	$pet = $_POST['del_pet'];
	$id_user = $_SESSION["user"]["user_id"];
	
	$query_pet = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'
					AND pts.pet_name = '$pet'";
					
	$del = mysqli_query($conexion,$query_pet);
		
	if(mysqli_num_rows($del)>0){
		
		$query_del = 	"DELETE FROM pets
						WHERE pets.pet_idUser = '$id_user'
						AND pets.pet_name = '$pet'";
		$delete = mysqli_query($conexion,$query_del);
				
		echo '<script>window.location="../html/pet/del_pet.php";</script>';
	}
	else{
		
	}
}

?>
</body>
</html>