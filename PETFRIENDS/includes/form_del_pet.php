<?php
								$email = $_SESSION["user"]["user_email"];
								$query_del_pets = 	"SELECT *
													FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
													ON pdb.user_id = pts.pet_idUser
													WHERE pdb.user_email = '$email'";
								$consulta_del_pets = mysqli_query($conexion,$query_del_pets);
								$del_pets = mysqli_fetch_array($consulta_del_pets);
								echo '<option value="',$del_pets["pet_name"],'">',$del_pets["pet_name"],'</option>';
								while ($del_pets = mysqli_fetch_array($consulta_del_pets)){
									echo '<option value="',$del_pets["pet_name"],'">',$del_pets["pet_name"],'</option>';
								}
							?>