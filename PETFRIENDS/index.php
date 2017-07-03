<?php
session_start();
//LOGIN EMAIL/PASS
if(!isset($_SESSION["error_usuario"])){	//la primera vez que entra al sitio pasa por aqui.
		$_SESSION["error_usuario"]="0";
}

if(!isset($_SESSION["reg_usuario"])){	//la primera vez que entra al sitio pasa por aqui.
		$_SESSION["reg_usuario"]="0";
}

if($_SESSION["reg_usuario"] == "1"){	//si ya existe un usuario con ese email al registrarse pasa por aqui.
echo '	<div class="alert alert-danger">
		<strong>Error!</strong> El Correo Electronico utilizado ya esta en uso.
		</div>';
		$_SESSION["reg_usuario"] = 0;
}

if($_SESSION["reg_usuario"] == "2"){	//si logro registrarse entra aqui.
echo '	<div class="alert alert-success">
		<strong>Felicidades!</strong> Ya puedes iniciar sesion con tu nueva cuenta.
		</div>';
		$_SESSION["reg_usuario"] = 0;
}

if($_SESSION["error_usuario"] == "1"){	//si la validacion no encontro coincidencias activa la alerta
echo '	<div class="alert alert-danger">
		<strong>Error!</strong> El Correo Electronico / Contraseña no son correctos.
		</div>';
		$_SESSION["error_usuario"] = 0;
echo '	<style type="text/css">
		#correo_login,#password_login{
		border-color:red;
		}
		</style>';
}

if(isset($_SESSION["user"])){	//si ya comprobo email y password, $_SESSION tiene valor y pasa a redirigir
		echo '<script>window.location="html/user/perfil_user.php";</script>';
}
//LOGIN REDES SOCIALES
require_once('vendor/autoload.php');
require_once('App/Auth/Auth.php');


?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<header class="container col-md-12 bg-header">
		<div class="col-md-5 text-left">
			<img src="images/logo_petfriends.png" width="240px">
		</div>
		<div class="col-md-1">
		
		</div>
		<div class="col-md-6">
			<form method="post" action="includes/validar.php">
					<div class="form-group col-md-5">
						<label for="correo_login">Correo Electronico</label>
						<input type="email" class="form-control correo_login" name="login_email" id="correo_login" placeholder="Correo Electronico">
					</div>
				<div class="form-group col-md-5">
					<label for="password_login">Contraseña</label>
					<input type="password" class="form-control" name="login_pw" id="password_login" placeholder="Contraseña" required>
				</div>
				<div class="col-md-2" style="padding-top:25px;">
					<button type="submit" class="btn btn-default col-md-12" name="login">Ingresar</button>
				</div>
			</form>
<?php
Auth::getUserAuth();
?>
			<div class="col-md-12 text-right">
				<a href="?login=Google" id="google"><img src="images/login_google.png" width="180px"></a>
				<a href="?login=Facebook" id="facebook"><img src="images/login_facebook.png" width="180px"></a>
			</div>

		</div>
	</header>
	
	<article class="bg-article col-md-12 row equal">
		
		<div class="col-md-1"></div>
		
		<div class="col-md-4" style="border-radius: 15px;background-color:#FEEEE0;">
		<img src="images/cat_dog.png" width="350px" style="padding-top:150px;">
		</div>
		
		<div class="col-md-1"></div>
		
		<div class="col-md-5" style="border-radius: 15px;background-color:#FEEEE0;">
			<h1 class="container">¿No tenes una cuenta?</h1>
			<h1 class="container">Registrate</h1>
			<hr></hr>
			<form method="post" action="includes/registrar.php" onsubmit="return valida();">
				<div class="form-group col-md-6">
					<label for="register_nombre">Nombre:</label>
					<input type="text" class="form-control" name="reg_nombre" id="register_nombre" placeholder="Nombre">
				</div>
				<div class="form-group col-md-6">
					<label for="register_apellido">Apellido:</label>
					<input type="text" class="form-control" name="reg_apellido" id="register_apellido" placeholder="Apellido">
				</div>
				<div class="form-group col-md-12">
					<label for="register_correo">Correo Electronico:</label>
					<input type="email" class="form-control" name="reg_email" id="register_correo" placeholder="Correo Electronico">
				</div>
				<div class="form-group col-md-6">
					<label for="register_password">Contraseña:</label>
					<input type="password" class="form-control" name="reg_password" id="register_password" placeholder="Contraseña">
				</div>
				<div class="form-group col-md-6">
					<label for="register_repeat_password">Repetir Contraseña:</label>
					<input type="password" class="form-control" name="reg_repPassword" id="register_repeat_password" placeholder="Repetir Contraseña">
				</div>
				<div class="form-group col-md-12">
				<label>Genero:</label>
				<label>
					<input type="radio" name="sexo_options" id="sexo_hombre" value="male"> Hombre
				</label>
				<label>
					<input type="radio" name="sexo_options" id="sexo_mujer" value="female"> Mujer
				</label>
				</div>
				<div class="form-group col-md-6">
					<label for="register_fecha">Fecha de Nacimiento:<small class="help-block">(Opcional)</small></label>
					<input type="date" class="form-control" name="reg_fecha" id="register_fecha" placeholder="Fecha de Nacimiento">
				</div>
				<div class="form-group col-md-6">
					<label for="register_telefono">Telefono:<small class="help-block">(Opcional)</small></label>
					<input type="text" class="form-control" name="reg_tel" id="register_telefono" placeholder="Telefono">
				</div>
				<div class="form-group col-md-12">
						<button type="submit" class="btn btn-default">Registrarte</button>
				</div>
				<div class="form-group col-md-6">
					<input type="text" style="visibility:hidden;" class="form-control" name="reg_lat" id="register_latitud" placeholder="Latitud">
				</div>
				<div class="form-group col-md-6">
					<input type="text" style="visibility:hidden;" class="form-control" name="reg_lon" id="register_longitud" placeholder="Longitud">
				</div>
			</form>
		</div>
		
		<div class="col-md-1"></div>
		<script type="text/javascript">
				
				var divMapa = document.getElementById('gmapa');
				navigator.geolocation.getCurrentPosition(fn_ok,fn_error,{maximumAge:60000, timeout:5000, enableHighAccuracy:true})
				function fn_error(){}
				function fn_ok(respuesta){
					var lat = respuesta.coords.latitude;
					var lon = respuesta.coords.longitude;
					document.getElementById('register_latitud').value = lat
					document.getElementById('register_longitud').value = lon
				}
				
				</script>
	</article>
	
	<footer class="col-md-12 bg-footer">
	<center style="color:#ffffff;">Trabajo Practico Final para la materia Programacion Web II</center>
	<center style="color:#ffffff;">::Integrantes::</center>
	<center style="color:#ffffff;">Juan Sanchez, Damian Gayoso Cuesta</center>
	</footer>

</body>
</html>