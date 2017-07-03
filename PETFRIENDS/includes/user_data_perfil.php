<?php
				echo '<div class="col-md-6"><img src="',$row["user_photo"],'" width="250px"></div>';
				echo '<div class="col-md-6"></div>';
				echo '<div class="col-md-12" style="padding-top:20px;padding-bottom:20px;">';
				echo '<p>Nombre: ',$row["user_firstName"],'</p>';
				echo '<p>Apellido: ',$row["user_lastName"],'</p>';
				echo '<p>Correo Electronico: ',$row["user_email"],'</p>';
				echo '<p>Telefono: ',$row["user_phone"],'</p>';
				echo '<p>Fecha de Nacimiento: ',$row["user_birthdate"],'</p>';
				echo '<p>GENERO: ',$row["user_gender"],'</p>';
				echo '<a href="" class="btn btn-default" onclick="emergente(\'perfil_edit_user.php\')">Editar Perfil</a>';			
				echo '</div>';
				
				$user = $_SESSION["user"]["user_email"];
				$query_socials = 	"SELECT *
									FROM petfriends_db.users_social as userss INNER JOIN  petfriends_db.users as users
									ON users.user_id = userss.user_id
									WHERE users.user_email = '$user'";
				$result = mysqli_query($conexion,$query_socials);
				if(mysqli_num_rows($result)>0){
				echo '<form method="post" action="/PETFRIENDS/includes/latlon.php">
				    	<div class="form-group col-md-12">
						<button type="submit" class="btn btn-default">Registrar Ubicacion (Usuarios Google/Facebook)</button>
						</div>
						<div class="form-group col-md-6">
						<input type="text" style="visibility:hidden;" class="form-control" name="reg_lat" id="register_latitud" placeholder="Latitud">
						</div>
						<div class="form-group col-md-6">
						<input type="text" style="visibility:hidden;" class="form-control" name="reg_lon" id="register_longitud" placeholder="Longitud">
						</div>
						</form>';
				echo '<script type="text/javascript">
				
						var divMapa = document.getElementById(\'gmapa\');
						navigator.geolocation.getCurrentPosition(fn_ok,fn_error)
						function fn_error(){}
						function fn_ok(respuesta){
							var lat = respuesta.coords.latitude;
							var lon = respuesta.coords.longitude;
							document.getElementById(\'register_latitud\').value = lat
							document.getElementById(\'register_longitud\').value = lon
						}
				
						</script>';
				}
				?>