<?php
			$user_id = $_SESSION["user"]["user_id"];
			$status = "DISPONIBLE";
			
			$query_infoPets = 	"SELECT *
								FROM petfriends_db.crosses as crosses INNER JOIN petfriends_db.pets as pets
								ON crosses.cross_petId = pets.pet_id INNER JOIN petfriends_db.type as type
								ON type.type_id = pets.pet_type INNER JOIN petfriends_db.breeds as breeds
								ON breeds.breed_id = pets.pet_breed
								WHERE crosses.cross_status = '$status'";
								
			$consulta_infoPets = mysqli_query($conexion,$query_infoPets);
			
			$gender = "female";
			
			$query_myPets = 	"SELECT *
								FROM petfriends_db.crosses as crosses INNER JOIN petfriends_db.pets as pets
								ON crosses.cross_petId = pets.pet_id INNER JOIN petfriends_db.type as type
								ON type.type_id = pets.pet_type INNER JOIN petfriends_db.breeds as breeds
								ON breeds.breed_id = pets.pet_breed
								WHERE crosses.cross_status = '$status'
								AND pets.pet_idUser = '$user_id'";
								
			$consulta_myPets = mysqli_query($conexion,$query_myPets);
			
			//INICIO OFRECIMIENTOS
			
			$query_uno_dates = "SELECT *
								FROM petfriends_db.pets as pets INNER JOIN petfriends_db.crosses as crosses
								ON crosses.cross_petId = pets.pet_id
								WHERE pets.pet_idUser = '$user_id'";
			$consulta_uno_dates = mysqli_query($conexion,$query_uno_dates);
			
			while ($numPet = mysqli_fetch_array($consulta_uno_dates)){
				echo '<hr /><h4>Citas para '.$numPet["pet_name"].'</h4>';
				echo '<table class="table table-striped" style="width:100%">
						<tr>
						<th>Foto</th>
						<th>Nombre</th>
						<th>Tipo</th> 
						<th>Raza</th>
						<th>Sexo</th>
						<th>Edad</th>
						<th>Tamaño</th>
						<th>Aceptar</th>
						</tr>';
				  
				$id_pet_actual = $numPet["pet_id"];
				$query_dos_dates = "SELECT *
									FROM petfriends_db.dates as dates INNER JOIN petfriends_db.pets as pets
									ON dates.date_petA = pets.pet_id INNER JOIN petfriends_db.type as type
									ON type.type_id = pets.pet_type INNER JOIN petfriends_db.breeds as breeds
									ON breeds.breed_id = pets.pet_breed
									WHERE dates.date_petB = '$id_pet_actual'";
				$consulta_dos_dates = mysqli_query($conexion,$query_dos_dates);
				while ($numPet = mysqli_fetch_array($consulta_dos_dates)){
						echo	'<tr>
								<td><img src="',$numPet["pet_photo"],'" width="75px"></td>
								<td>',$numPet["pet_name"],'</td> 
								<td>',$numPet["type_description"],'</td>
								<td>',$numPet["breed_description"],'</td>
							<td>',$numPet["pet_gender"],'</td>	
						<td>',$numPet["pet_age"],'</td>
						<td>',$numPet["pet_size"],'</td>
						<td>'; 
						if($numPet["pet_idUser"] != $user_id){
						echo '<a href="#">Aceptar!</a>';
						}
						echo '</td></tr>';
					
				}
				echo '</table><hr />';
			}	
			
			//FIN OFRECIMIENTOS
			
			echo '<hr /><h4>Mis Mascotas Disponibles</h4>
					<div class="text-center">
					<input type="text" id="Search" onkeyup="myFunction_search(\'my_pets_cruce\')" placeholder="Buscar..."></div>
					<table class="table table-striped" id="my_pets_cruce" style="width:100%">
				  <tr>
					<th>Foto</th>
					<th>Nombre</th>
					<th>Tipo</th> 
					<th>Raza</th>
					<th>Sexo</th>
					<th>Edad</th>
					<th>Tamaño</th>
					</tr>';
				while ($myPets = mysqli_fetch_array($consulta_myPets)){	  
					
				echo	'<tr>
						<td><img src="',$myPets["pet_photo"],'" width="75px"></td>
						<td>',$myPets["pet_name"],'</td> 
						<td>',$myPets["type_description"],'</td>
						<td>',$myPets["breed_description"],'</td>
						<td>';
						
						if($myPets["pet_gender"] = $gender){
								echo'Femenino<span class="glyphicons glyphicons-gender-female"></span>';
						}else{
								echo'Masculino<span class="glyphicons glyphicons-gender-male"></span>';
						}
						echo '</td>
						<td>',$myPets["pet_age"],'</td>
						<td>',$myPets["pet_size"],'</td>
						</tr>';
				  
				}  
			echo '</table><hr />';
			/////////////////////////////////////////////////////////////////////
			echo '<h4>Todas las Mascotas Disponibles</h4>
					<div class="text-center">
					<input type="text" id="Search_other" onkeyup="myFunction_other_search(\'other_pets_cruce\')" placeholder="Buscar..."></div>
					<table class="table table-striped" id="other_pets_cruce" style="width:100%">
				  <tr>
					<th>Foto</th>
					<th>Nombre</th>
					<th>Tipo</th> 
					<th>Raza</th>
					<th>Sexo</th>
					<th>Edad</th>
					<th>Tamaño</th>
					<th>Conocer</th>
				  </tr>';
				while ($infoPets = mysqli_fetch_array($consulta_infoPets)){	  
					
				echo	'<tr>
						<td><img src="',$infoPets["pet_photo"],'" width="75px"></td>
						<td>',$infoPets["pet_name"],'</td> 
						<td>',$infoPets["type_description"],'</td>
						<td>',$infoPets["breed_description"],'</td>
						<td>',$infoPets["pet_gender"],'</td>
						<td>',$infoPets["pet_age"],'</td>
						<td>',$infoPets["pet_size"],'</td>
						<td>'; 
						if($infoPets["pet_idUser"] != $user_id){
						echo '<a href="/PETFRIENDS/html/pet/add_ofrecimiento.php?pet_id=',$infoPets["pet_id"],'">Cita!</a>';
						}
						echo '</td></tr>';
				  
				}  
			echo '</table>';
?>