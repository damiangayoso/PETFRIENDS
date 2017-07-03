<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/fpd/fpdf.php';
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';

$pet = $_GET['pet_name'];
$user = $_SESSION["user"]["user_id"];
							
$query_infoPet = 	"SELECT *
					FROM petfriends_db.pets as pdb INNER JOIN petfriends_db.type as type
					ON pdb.pet_type = type.type_id INNER JOIN petfriends_db.breeds as breeds
					ON breeds.breed_id = pdb.pet_breed
					WHERE pdb.pet_idUser = '$user'
					AND pdb.pet_name = '$pet'";
					$consulta_infoPet = mysqli_query($conexion,$query_infoPet);
					$infoPet = mysqli_fetch_array($consulta_infoPet);

$nombre_mascota = $infoPet["pet_name"]; // $nombre_mascota CONTIENE Chucha
$tipo_mascota = $infoPet["type_description"]; // $tipo_mascota CONTIENE Perro
$raza_mascota = $infoPet["breed_description"]; // $raza_mascota CONTIENE Akita
$tamano_mascota = $infoPet["pet_size"]; // $tamano_mascota CONTIENE Grande

// tenes que meter esos 4 datos en el pdf, de aca para abajo edita lo necesario

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Me perdi');
$pdf->Cell(40,40,'Me llamo:');
$pdf->Cell(60,10,'Hecho con FPDF.',0,1,'C');
//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
// Inserta un logo en la esquina superior izquierda a 300 ppp
$pdf->Image('perro.jpg',100,100,-300);
$pdf->Output();
?>