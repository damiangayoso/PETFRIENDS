<?php
							$pet = $_GET['pet_name'];
							$user = $_SESSION["user"]["user_id"];
							
							$query_infoPet = 	"SELECT *
												FROM petfriends_db.pets as pdb INNER JOIN petfriends_db.type as type
												ON pdb.pet_type = type.type_id INNER JOIN petfriends_db.breeds as breeds
												ON breeds.breed_id = pdb.pet_breed
												WHERE pdb.pet_idUser = '$user'
												AND pdb.pet_name = '$pet'";
							$consulta_infoPet = mysqli_query($conexion,$query_infoPet);
							$infoPet = mysqli_fetch_array($consulta_infoPet);
							echo '
							<div class="col-md-6" style="background-color:white;padding:0px;">
							<ul class="nav nav-tabs nav-justified">
								<li role="presentation"><a href="','/PETFRIENDS/html/pet/pet_wall.php?pet_name=',$pet,'&user_pet_id='.$user.'">Muro</a></li>
								<li role="presentation"><a href="','/PETFRIENDS/html/pet/pet_create_post.php?pet_name=',$pet,'&user_pet_id='.$user.'">Crear POST</a></li>
								<li role="presentation" class="active"><a href="','/PETFRIENDS/html/pet/perfil_pet.php?pet_name=',$pet,'">Perfil Mascota</a></li>
							</ul>
							<div class="col-md-12" style="border-style:solid;border-top:1px;border-color:#CCCCCC;border-width:1px;padding-top:20px;">
							<div class="col-md-12">
							<div class="col-md-6"><img src="',$infoPet["pet_photo"],'" width="250px" ></div>
							<div class="col-md-6"></div>
							<div class="col-md-12" style="padding-top:20px;padding-bottom:20px;">
							<p>Nombre: ',$infoPet["pet_name"],'</p>
							<p>Tipo: ',$infoPet["type_description"],'</p>
							<p>Raza: ',$infoPet["breed_description"],'</p>
							<p>Edad: ',$infoPet["pet_age"],'</p>
							<p>Tamaño: ',$infoPet["pet_size"],'</p>
							<p>Sexo: ',$infoPet["pet_gender"],'</p>
							<p>Estado: ',$infoPet["pet_status"],'</p>
							<a  class="btn btn-default" onclick="emergente(\'perfil_edit_pet.php?pet_name='.$pet.'\')">Editar Perfil</a>
							
							</div>
							</div>
							<hr />
								<div id="container_siempre" class="col-md-12" style="height: 400px;"></div>
								<hr />
								<div id="container_dia" class="col-md-12" style="height: 400px;"></div>
								<hr />
								<div id="container_semana" class="col-md-12" style="height: 400px;"></div>
							</div>
			
							</div>';
						?>