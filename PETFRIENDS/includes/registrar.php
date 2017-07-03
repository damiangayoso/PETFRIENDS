<?php
session_start();
require 'base_de_datos.php';
$regNombre = $_POST['reg_nombre'];
$regApellido = $_POST['reg_apellido'];
$regPassword = md5($_POST['reg_password']);
$regEmail = $_POST['reg_email'];
$regGenero = $_POST['sexo_options'];
$regFecha = $_POST['reg_fecha'];
$regTel = $_POST['reg_tel'];
$regLat = $_POST['reg_lat'];
$regLon = $_POST['reg_lon'];

$sql_compara = "	SELECT * 
					FROM petfriends_db.users as pdb
					WHERE pdb.user_email = '$regEmail'";
$compara = mysqli_query($conexion,$sql_compara)or die("ERROR");
if(mysqli_num_rows($compara)>0){
		$_SESSION["reg_usuario"] = 1;
		header ('location: ../index.php');
	}
else{
	$query_reg = "	INSERT INTO users 	(user_firstName,user_lastName,user_pass,user_email,user_gender,user_birthdate,user_phone,user_lat,user_lon) 
				VALUES				('".$regNombre."','".$regApellido."','".$regPassword."','".$regEmail."','".$regGenero."','".$regFecha."','".$regTel."','".$regLat."','".$regLon."')";

	$registro = mysqli_query($conexion,$query_reg)or die("ERROR AL INSERTAR");
	$_SESSION["reg_usuario"] = 2;
	header ('location: ../index.php');		
	}
		
		
		
		

?>