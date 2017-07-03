<?php
								$email = $_SESSION["user"]["user_email"];
								$query = 	"SELECT *
											FROM petfriends_db.users as pdb
											WHERE pdb.user_email = '$email'";
											
								$consulta = mysqli_query($conexion,$query);
								$row = mysqli_fetch_array($consulta);
								echo $row["user_firstName"];
							?>