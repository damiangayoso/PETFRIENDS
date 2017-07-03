			<?php
			$user_name = $_SESSION["user"]["user_firstName"];
			$email = $_SESSION["user"]["user_email"];
			$query_pets = 	"SELECT *
							FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
							ON pdb.user_id = pts.pet_idUser
							WHERE pdb.user_email = '$email'";
											
			$consulta_pets = mysqli_query($conexion,$query_pets);
			echo '<p class="user_pet_title">Mascotas de ',$user_name,'</p>';
			while ($pets = mysqli_fetch_array($consulta_pets)){
				echo '<p><span class="glyphicon glyphicon-share-alt" aria-hidden="true" style="color:#79A8B1;"> </span> <a style="color:#79A8B1;" href="','/PETFRIENDS/html/pet/perfil_pet.php?pet_name=',$pets["pet_name"],'&user_pet_id=',$_SESSION["user"]["user_id"],'">',$pets["pet_name"],'</a></p>';
			} 
			echo '<hr />
			<p><span class="glyphicon glyphicon-log-in" aria-hidden="true" style="color:#79A8B1;">  </span> <a style="color:#79A8B1;" href="/PETFRIENDS/html/pet/perdida.php">  MASCOTAS PERDIDAS</a></p>
			<hr />
			<p><span class="glyphicon glyphicon-log-in" aria-hidden="true" style="color:#79A8B1;">  </span> <a style="color:#79A8B1;" href="/PETFRIENDS/html/pet/adopcion.php">  MASCOTAS EN ADOPCION</a></p>
			<hr />
			<p><span class="glyphicon glyphicon-log-in" aria-hidden="true" style="color:#79A8B1;">  </span> <a style="color:#79A8B1;" href="/PETFRIENDS/html/pet/cachorros.php">  CACHORROS EN ADOPCION</a></p>
			<hr />
			<p><span class="glyphicon glyphicon-log-in" aria-hidden="true" style="color:#79A8B1;">  </span> <a style="color:#79A8B1;" href="/PETFRIENDS/html/pet/cruce.php">  CRUCE DE MASCOTAS</a></p>';
			
			?>