<?php
			$user_id = $_SESSION["user"]["user_id"];
			$status = "EN ADOPCION";
			
			$query_infoPets = 	"SELECT *
								FROM petfriends_db.adoptions as adoptions INNER JOIN petfriends_db.pets as pets
								ON adoptions.adoption_petId = pets.pet_id INNER JOIN petfriends_db.type as type
								ON type.type_id = pets.pet_type INNER JOIN petfriends_db.breeds as breeds
								ON breeds.breed_id = pets.pet_breed
								WHERE adoptions.adoption_status = '$status'";
								
			$consulta_infoPets = mysqli_query($conexion,$query_infoPets);
			$gender = "female";
			
			$query_myPets = 	"SELECT *
								FROM petfriends_db.adoptions as adoptions INNER JOIN petfriends_db.pets as pets
								ON adoptions.adoption_petId = pets.pet_id INNER JOIN petfriends_db.type as type
								ON type.type_id = pets.pet_type INNER JOIN petfriends_db.breeds as breeds
								ON breeds.breed_id = pets.pet_breed
								WHERE adoptions.adoption_status = '$status'
								AND pets.pet_idUser = '$user_id'";
								
			$consulta_myPets = mysqli_query($conexion,$query_myPets);
			
			echo '<hr /><h4>Mis Mascotas en Adopcion</h4>
					<div class="text-center">
					<input type="text" id="Search" onkeyup="myFunction_search(\'my_pets_adop\')" placeholder="Buscar..."></div>
					<table class="table table-striped" id="my_pets_adop" style="width:100%">
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
						<td>',$myPets["pet_gender"],'</td>
						<td>',$myPets["pet_age"],'</td>
						<td>',$myPets["pet_size"],'</td>
						</tr>';
				  
				}  
			echo '</table><hr />';
			/////////////////////////////////////////////////////////////////////
			echo '<h4>Todas las Mascotas en Adopcion</h4>
					<div class="text-center">
					<input type="text" id="Search_other" onkeyup="myFunction_other_search(\'other_pets_adop\')" placeholder="Buscar..."></div>
					<table class="table table-striped " id="other_pets_adop" style="width:100%">
				  <tr>
					<th>Foto</th>
					<th>Nombre</th>
					<th>Tipo</th> 
					<th>Raza</th>
					<th>Sexo</th>
					<th>Edad</th>
					<th>Tamaño</th>
					<th>Adoptar!</th>
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
						echo '<a href="/PETFRIENDS/includes/registrar_adopcion.php?pet_name=',$infoPets["pet_name"],'&pet_user_id=',$infoPets["pet_idUser"],'">Adoptar</a>';}
						echo '</td></tr>';
				  
				}  
			echo '</table>';
?>