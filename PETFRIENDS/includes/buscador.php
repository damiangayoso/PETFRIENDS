<?php
		$buscar = $_POST['buscar'];
		
		$query_buscar= 	"SELECT *
						FROM petfriends_db.pets as pets INNER JOIN petfriends_db.type as type
						ON type.type_id = pets.pet_type INNER JOIN petfriends_db.breeds as breeds
						ON breeds.breed_id = pets.pet_breed
						WHERE pets.pet_name = '$buscar'
						OR type.type_description = '$buscar'
						OR breeds.breed_description = '$buscar'";
											
		$consulta_pet = mysqli_query($conexion,$query_buscar);
		$alerta = 1;
		if(mysqli_num_rows($consulta_pet)>0){
			echo '	<p>Mascotas:</p>';
			echo '<table class="table table-striped table-hover" style="width:100%">
				  <tr>
					<th>Nombre</th>
					<th>Tipo</th> 
					<th>Raza</th>
					<th>Sexo</th>
				  </tr>';
				  
			while ($resultado_pet = mysqli_fetch_array($consulta_pet)){
				echo '
				<tr style="cursor: pointer;" onclick="window.location.href = \'/PETFRIENDS/html/pet/other_perfil_pet.php?pet_name=',$resultado_pet["pet_name"],'&user_pet_id=',$resultado_pet["pet_idUser"],'\';">
				<td>',$resultado_pet["pet_name"],'</td>
				<td>',$resultado_pet["type_description"],'</td>
				<td>',$resultado_pet["breed_description"],'</td>
				<td>',$resultado_pet["pet_gender"],'</td>
				</tr>
				';
			}
			echo '</table><hr />';
			$alerta = 0;
		}
		
		$query_buscar= 	"SELECT *
						FROM petfriends_db.users as users
						WHERE users.user_firstName = '$buscar'
						OR users.user_lastName = '$buscar'
						OR users.user_email = '$buscar'";
											
		$consulta_user = mysqli_query($conexion,$query_buscar);
		
		if(mysqli_num_rows($consulta_user)>0){
			echo '<p>Usuarios:</p>';
			echo '<table class="table table-striped table-hover" style="width:100%">
				  <tr>
					<th>Nombre</th>
					<th>Apellido</th> 
					<th>Email</th>
				  </tr>';
			while ($resultado_user = mysqli_fetch_array($consulta_user)){
				echo '
				<tr style="cursor: pointer;" onclick="window.location.href = \'/PETFRIENDS/html/user/other_perfil_user.php?user_pet_id=',$resultado_user["user_id"],'\';">
				<td>',$resultado_user["user_firstName"],'</td>
				<td>',$resultado_user["user_lastName"],'</td>
				<td>',$resultado_user["user_email"],'</td>
				</tr>
				';
			}
			echo '</table><hr />';
			$alerta = 0;
		}

		if($alerta == 1){
			echo '<p>No se han encontrado resultados con el texto proporcionado.</p>';
		}
?>