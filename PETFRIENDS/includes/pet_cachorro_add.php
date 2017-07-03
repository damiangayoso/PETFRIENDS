<?php
session_start();
?>
<html>
<head></head>
<body>
<?php

require 'base_de_datos.php';

if(isset($_POST['add_cachorro'])){
	
	$email = $_SESSION["user"]["user_email"];
	$tipo = $_POST['tipo'];
	$raza_m = $_POST['raza_m'];
	$raza_f = $_POST['raza_f'];
	$fecha = $_POST['fecha'];
	$id_user = $_SESSION["user"]["user_id"];
	$status = "EN ADOPCION";


	$query_add = 	"INSERT INTO petfriends_db.puppies (puppy_userId,puppy_type,puppy_mother,puppy_father,puppy_birthday,puppy_status)
					VALUES ('$id_user','$tipo','$raza_m','$raza_f','$fecha','$status')";
	$add = mysqli_query($conexion,$query_add);
				
	echo '<script>window.location="/PETFRIENDS/html/pet/cachorros.php";</script>';


}

?>
</body>
</html>