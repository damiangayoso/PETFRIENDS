<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="../../css/estilo.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<header class="container col-md-12 bg-header">
<div class="col-md-12 text-center">
<img src="/PETFRIENDS/images/logo_petfriends.png" width="240px">
</div>
</header>
<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
$pet_name = $_GET['pet_name'];
$user = $_GET['user_pet_id'];

$query_infoPet = 	"SELECT *
					FROM petfriends_db.pets as pets INNER JOIN petfriends_db.type as type
					ON pets.pet_type = type.type_id INNER JOIN petfriends_db.breeds as breeds
					ON breeds.breed_id = pets.pet_breed INNER JOIN petfriends_db.users as users
					ON users.user_id = pets.pet_idUser
					WHERE pets.pet_idUser = '$user'
					AND pets.pet_name = '$pet_name'";
$consulta_infoPet = mysqli_query($conexion,$query_infoPet);
$infoPet = mysqli_fetch_array($consulta_infoPet);
$pet_id = $infoPet ["pet_id"];

$query_actualizar = "SELECT * FROM petfriends_db.lost_pets as lost_pets
					WHERE lost_pets.lost_petId = '$pet_id' AND lost_pets.lost_userId = '$user'";
$consulta_actualizar = mysqli_query($conexion,$query_actualizar);					

$status = "ENCONTRADO";


if(mysqli_num_rows($consulta_actualizar)>0) {
	$query_ac = "UPDATE petfriends_db.lost_pets as lost_pets SET lost_pets.lost_status = '$status'
				WHERE lost_pets.lost_petId = '$pet_id' AND lost_pets.lost_userId = '$user'";
	$consulta_ac = mysqli_query($conexion,$query_ac);								
}

echo '<article class="bg-article col-md-12 row equal">

<div id="mensaje" class=" col-md-12">
<form method="post" action="mailto:'.$infoPet["user_email"].'" enctype="text/plain">
	<p></p>
	<div class="form-group">
	<label for="comentario">Mandar un correo a '.$infoPet["user_firstName"].' '.$infoPet["user_lastName"].':</label>
	<textarea class="form-control" rows="5" name="texto_comentario" id="comentario"></textarea>
	<p></p>
	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span> Enviar!</button>
	</div>
	</form>
</div>
</article>';



?>
	<footer class="col-md-12 bg-footer">
	<center style="color:#ffffff;">Trabajo Practico Final para la materia Programacion Web II</center>
	<center style="color:#ffffff;">::Integrantes::</center>
	<center style="color:#ffffff;">Juan Sanchez, Damian Gayoso Cuesta</center>
	</footer>
</body>
</html>