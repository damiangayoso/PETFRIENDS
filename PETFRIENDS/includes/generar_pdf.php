<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
require $raiz.'/PETFRIENDS/App/mpdf/mpdf.php';
require $raiz.'/PETFRIENDS/App/phpqrcode/qrlib.php';

$pet_name = $_GET['pet_name'];
$user = $_GET['pet_user_id'];

$query_info = 	"SELECT *
				FROM petfriends_db.pets as pets INNER JOIN petfriends_db.lost_pets as lost_pets
				ON lost_pets.lost_petId = pets.pet_id INNER JOIN petfriends_db.type as type
				ON type.type_id = pets.pet_type INNER JOIN petfriends_db.breeds as breeds
				ON breeds.breed_id = pets.pet_breed INNER JOIN petfriends_db.users as users
				ON users.user_id = pets.pet_idUser
				WHERE pets.pet_name = '$pet_name'
				AND pets.pet_idUser = '$user'";
$consulta_info = mysqli_query($conexion,$query_info);
$infoPet = mysqli_fetch_array($consulta_info);
////////////////////////////////////////////////////////////////////

$directorio = $raiz.'/PETFRIENDS/resources/'.$infoPet["user_email"].'/'.$infoPet["pet_name"].'/';
if (!file_exists($directorio)) {
	mkdir($directorio, 0777, true);
}

$url = 'localhost/PETFRIENDS/html/pet/other_perdida.php?pet_name='.$infoPet["pet_name"].'&user_pet_id='.$infoPet["pet_idUser"];
$qr = QRcode::png($url,$directorio.'QR.png');

$css = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');

$html = '
		<div class="col-md-12">
		<p><h1 class="text-center">Se Busca Mascota:</h1></p>
		<p class="text-center"><img src="'.$infoPet["pet_photo"].'" width="400px"/></p>
		<hr />
		<p>Nombre:'.$infoPet["pet_name"].'</p>
		<p>Tipo: '.$infoPet["type_description"].'</p>
		<p>Raza: '.$infoPet["breed_description"].'</p>
		<p>Edad: '.$infoPet["pet_age"].'</p>
		<p>Tamaño: '.$infoPet["pet_size"].'</p>
		<p></p>
		<div style="border-style:dashed;border-width:5px;padding:5px;"><p>Informacion del Dueño:</p>
		<p>'.$infoPet["lost_description"].'</p></div>
		<div class="col-md-4 text-center"><img src="'.$directorio.'QR.png"><p>Si tenes informacion sobre el paradero de esta mascota, Ingresa a PETFRIENDS utilizando el CODIGO QR que te brindamos aqui o mediante la direccion: '.$url.'</p> </div>
		
		</div>';

$mpdf = new mPDF('c','A4');
$mpdf->writeHTML($css, 1);
$mpdf->writeHTML($html);
$mpdf->Output('mascota_perdida.pdf', 'I');
?>