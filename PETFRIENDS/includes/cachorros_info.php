<?php
			$user_id = $_SESSION["user"]["user_id"];
			$status = "EN ADOPCION";
			
			$query_infoPets = 	"SELECT puppies.puppy_userId as puppy_userId,puppies.puppy_id as puppy_id,users.user_id as usuario,type.type_description as tipo,breeds_m.breed_description as madre,breeds_f.breed_description as padre,puppies.puppy_birthday as fecha
								FROM petfriends_db.puppies as puppies INNER JOIN petfriends_db.users as users
								ON puppies.puppy_userId = users.user_id INNER JOIN petfriends_db.type as type
								ON type.type_id = puppies.puppy_type INNER JOIN petfriends_db.breeds as breeds_m
								ON breeds_m.breed_id = puppies.puppy_mother INNER JOIN petfriends_db.breeds as breeds_f
								ON breeds_f.breed_id = puppies.puppy_father
								WHERE puppies.puppy_status = '$status'";
								
			$consulta_infoPets = mysqli_query($conexion,$query_infoPets);
			$gender = "female";
			
			$query_myPets = 	"SELECT users.user_id as usuario,type.type_description as tipo,breeds_m.breed_description as madre,breeds_f.breed_description as padre,puppies.puppy_birthday as fecha
								FROM petfriends_db.puppies as puppies INNER JOIN petfriends_db.users as users
								ON puppies.puppy_userId = users.user_id INNER JOIN petfriends_db.type as type
								ON type.type_id = puppies.puppy_type INNER JOIN petfriends_db.breeds as breeds_m
								ON breeds_m.breed_id = puppies.puppy_mother INNER JOIN petfriends_db.breeds as breeds_f
								ON breeds_f.breed_id = puppies.puppy_father
								WHERE puppies.puppy_status = '$status'
								AND users.user_id = '$user_id'";
								
			$consulta_myPets = mysqli_query($conexion,$query_myPets);
			
			echo '<hr /><h4>Mis Cachorros en Adopcion</h4>
					<table class="table table-striped" id="my_pets_cach" style="width:100%">
				  <tr>
					<th>Tipo</th>
					<th>Raza.Madre</th>
					<th>Raza.Padre</th> 
					<th>Fecha Nacimiento</th>
					</tr>';
				while ($myPets = mysqli_fetch_array($consulta_myPets)){	  
					
				echo	'<tr>
						<td>',$myPets["tipo"],'</td>
						<td>',$myPets["madre"],'</td> 
						<td>',$myPets["padre"],'</td>
						<td>',$myPets["fecha"],'</td>
						</tr>';
				  
				}  
			echo '</table><hr />';
			/////////////////////////////////////////////////////////////////////
			echo '<h4>Todos los Cachorros en Adopcion</h4>
					<div class="text-center">
					<input type="text" id="Search_cachorros" onkeyup="myFunction_cachorros_search(\'other_pets_cach\')" placeholder="Buscar..."></div>
					<table class="table table-striped " id="other_pets_cach" style="width:100%">
				  <tr>
					<th>Tipo</th>
					<th>Raza.Madre</th>
					<th>Raza.Padre</th> 
					<th>Fecha Nacimiento</th>
					<th>Adoptar!</th>
				  </tr>';
				while ($infoPets = mysqli_fetch_array($consulta_infoPets)){	  
					
				echo	'<tr>
						<td>',$infoPets["tipo"],'</td>
						<td>',$infoPets["madre"],'</td> 
						<td>',$infoPets["padre"],'</td>
						<td>',$infoPets["fecha"],'</td>
						<td>'; 
						if($infoPets["usuario"] != $user_id){
						echo '<a href="/PETFRIENDS/includes/registrar_cachorro.php?puppy_id='.$infoPets["puppy_id"].'&puppy_userId='.$infoPets["puppy_userId"].'">Adoptar</a>';}
						echo '</td></tr>';
				  
				}  
			echo '</table>';
?>