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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../js/filter.js"></script>
</head>
<body>
	<header class="col-md-12 bg-header">
		<div class="col-md-4">
			<img src="/PETFRIENDS/images/logo_petfriends.png" width="200px">
		</div>
		<div class="col-md-4 buscador">
			<form class="form-inline" method="post" action="http://localhost/PETFRIENDS/html/pet/pet_busqueda.php">
				<div class="form-group">
					<label for="buscador">Buscar:</label>
					<input type="text" class="form-control" id="buscador" name="buscar" placeholder="Escribe Aqui...">
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</div>
			</form>
		</div>
		<div class="col-md-4">
		<div class="col-md-12">
			<div class="btn-group">
			  <button type="button" class="dropdown-toggle menu_header" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php require $raiz.'/PETFRIENDS/includes/user_nombre.php'; ?> <span class="caret"> </span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="/PETFRIENDS/html/user/perfil_user.php">Mi Perfil</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="/PETFRIENDS/html/pet/add_pet.php">Agregar Mascota</a></li>
				<li><a href="/PETFRIENDS/html/pet/add_perdida.php">Agregar Mascota Perdida</a></li>
				<li><a href="/PETFRIENDS/html/pet/add_adopcion.php">Agregar Mascota en Adopcion</a></li>
				<li><a href="/PETFRIENDS/html/pet/add_cachorro.php">Agregar Cachorros en Adopcion</a></li>
				<li><a href="/PETFRIENDS/html/pet/add_cruce.php">Agregar Cruce de Mascotas</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="/PETFRIENDS/includes/logout.php">Salir</a></li>
			  </ul>
			  <?php require $raiz.'/PETFRIENDS/includes/user_mini_foto.php'; ?>
			</div>
		</div>
		</div>
	</header>
	
	<article class="bg-article col-md-12 row equal">
		<div class="col-md-3" style="background-color:#ffffff;">
			<?php require $raiz.'/PETFRIENDS/includes/menu_izquierda.php'; ?>
		</div>
		<div class="col-md-6" style="background-color:white;padding:0px;">
			<ul class="nav nav-tabs nav-justified">
				<li role="presentation" class="active"><a href="#"><h3>Mascotas en Adopcion</h3></a></li>
			</ul>
			<div class="col-md-12" style="border-style:solid;border-top:1px;border-color:#CCCCCC;border-width:1px;padding-top:20px;">
					<p>En esta seccion encontrara todas las mascotas de la comunidad que se encuentran en situacion de ser adoptadas.</p>
				
					<?php require $raiz.'/PETFRIENDS/includes/adopcion_info.php';?>			
			</div>
			
		</div>
	<div class="col-md-3 text-center" style="background-color:#ffffff;">
	<img src="../../images/banner_1.jpg" style="padding-bottom: 10px;padding-top:10px;">
	<img src="../../images/banner_2.jpg" style="padding-bottom: 10px;padding-top:10px;">
	</div>
				
		
	</article>
	
	<footer class="col-md-12 bg-footer">
	<center style="color:#ffffff;">Trabajo Practico Final para la materia Programacion Web II</center>
	<center style="color:#ffffff;">::Integrantes::</center>
	<center style="color:#ffffff;">Juan Sanchez, Damian Gayoso Cuesta</center>
	</footer>
</body>
</html>