<?php
	$user_main = $_SESSION["user"]["user_id"];
	$user = $_GET['user_pet_id'];
	
	$query_infoUser = 	"SELECT *
						FROM petfriends_db.users as users
						WHERE users.user_id = '$user'";
	$consulta_infoUser = mysqli_query($conexion,$query_infoUser);
	$infoUser = mysqli_fetch_array($consulta_infoUser);
	
	$query_infoPets = 	"SELECT *
						FROM petfriends_db.users as users INNER JOIN petfriends_db.pets as pets
						ON users.user_id = pets.pet_idUser
						WHERE users.user_id = '$user'";
	$consulta_infoPets = mysqli_query($conexion,$query_infoPets);
			
				echo '<ul class="nav nav-tabs nav-justified">
				<li role="presentation" class="active"><a href="#">Dueño</a></li>
				</ul>
				<div class="col-md-12" style="border-style:solid;border-top:1px;border-color:#CCCCCC;border-width:1px;padding-top:20px;">';
				echo '<div class="col-md-6"><img src="',$infoUser["user_photo"],'" width="250px"></div>';
				echo '<div class="col-md-6"></div>';
				echo '<div class="col-md-12" style="padding-top:20px;padding-bottom:20px;">';
				echo '<hr />';
				echo '<p>Nombre: ',$infoUser["user_firstName"],'</p>';
				echo '<p>Apellido: ',$infoUser["user_lastName"],'</p>';
				echo '<p>Correo Electronico: ',$infoUser["user_email"],'</p>';
				echo '<p>Telefono: ',$infoUser["user_phone"],'</p>';
				echo '<p>Fecha de Nacimiento: ',$infoUser["user_birthdate"],'</p>';
				echo '<p>GENERO: ',$infoUser["user_gender"],'</p>';
				echo '<hr />';
				echo '<p>Mascotas: </p>';
				
				while ($infoPets = mysqli_fetch_array($consulta_infoPets)){
				echo '<p><span class="glyphicon glyphicon-share-alt" aria-hidden="true" style="color:#79A8B1;"></span><a style="color:#79A8B1;" href="','/PETFRIENDS/html/pet/other_perfil_pet.php?pet_name=',$infoPets["pet_name"],'&user_pet_id=',$infoPets["pet_idUser"],'">',$infoPets["pet_name"],'</a></p>';
				} 
				
				echo '</div>';
				?>