<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
if(isset($_SESSION["user"])){
	echo '';
}
else{
	echo '<script>window.location="../../index.php";</script>'; //si intentan entrar a perfil_user.php sin logear los redirige a index.php
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../css/estilo.css"/>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
function cerrar()
 {
	window.close()
}
</script>
</head>
<body>
	
				<form method="post" enctype="multipart/form-data" action="/PETFRIENDS/includes/editar.php">
					<div class="form-group col-md-12">
						<label for="edit_user_nombre">Nombre:</label>
						<input type="text" class="form-control" id="edit_user_nombre" name="edit_nombre" placeholder="Nombre">
					</div>
					<div class="form-group col-md-12">
						<label for="edit_user_apellido">Apellido:</label>
						<input type="text" class="form-control" id="edit_user_apellido" name="edit_apellido" placeholder="Apellido">
					</div>
					<div class="form-group col-md-12">
						<label for="edit_user_telefono">Telefono:</label>
						<input type="text" class="form-control" id="edit_user_telefono" name="edit_telefono" placeholder="Telefono">
					</div>
					<div class="form-group col-md-12">
						<label for="edit_user_fecha">Fecha de Nacimiento:</label>
						<input type="date" class="form-control" id="edit_user_fecha" name="edit_fecha" placeholder="Fecha de Nacimiento">
					</div>
					<div class="form-group col-md-12">
						<label for="edit_user_direccion">Direccion:</label>
						<input type="text" class="form-control" id="edit_user_direccion" name="edit_direccion" placeholder="Nombre">
					</div>
					<div class="form-group col-md-12">
						<label>Sexo:</label>
							<label>						
							<input type="radio" name="x" id="user_sexo_masculino" value="male"> Masculino 
							</label>
							<label>
							<input type="radio" name="x" id="user_sexo_femenino" value="female"> Femenino
							</label>	
							
					</div>
					<div class="form-group col-md-12">
						<label for="edit_photo">Agregar Foto de Perfil:</label>
						<input type="file" id="edit_photo" name="edit_photo">
						<p class="help-block">Solo se permiten extensiones .jpg .png.</p>
					</div>
					<div class="form-group col-md-12">
						<button type="submit" class="btn btn-default"  >Guardar Cambios</button>
						<button type="button" class="btn btn-default" onclick="cerrar()">Cancelar</button>
					</div>
				</form>
			
			
		
</body>
</html>