<?php
session_start();
?>
<html>
<head></head>
<body>
<?php

require 'base_de_datos.php';

if(isset($_POST['login'])){ //si el boton de logear fue apretado da TRUE
	$usuario = $_POST['login_email']; //guardo email y contraseña que ingreso el usuario
	$usuario_pw = md5($_POST['login_pw']);
	$query = "	SELECT * 
				FROM petfriends_db.users as pdb
				WHERE pdb.user_email = '$usuario' 
				AND pdb.user_pass = '$usuario_pw'";
					
	$log = mysqli_query($conexion,$query); //consulta que compara los datos que el usuario ingreso con la base de datos
		
	if(mysqli_num_rows($log)>0){	//si la consulta encontro filas entonces vale mas que 0
		$row = mysqli_fetch_array($log);
		$_SESSION["user"] = $row; //guardo el email que se uso para logear para permitirme mantener la sesion mientras navega por distintas paginas
		echo '<script>window.location="../html/user/perfil_user.php";</script>'; //le permito al usuario entrar a su perfil
	}
	else{
		$_SESSION["error_usuario"] = 1;
		echo '<script>window.location="../index.php";</script>'; //si la consulta no encontro coincidencias se lo redirige al inicio de nuevo
	}
}

?>
</body>
</html>