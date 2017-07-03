<?php
	$email = $_SESSION["user"]["user_email"];
	$pet_cita_id = $_GET['pet_id'];
	$query_pets = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'";
	$consulta_pets = mysqli_query($conexion,$query_pets);
	
	echo '<form method="post" action="/PETFRIENDS/includes/pet_cita_add.php?pet_id='.$pet_cita_id.'">	
				<div class="form-group col-md-12">
					<label for="cita_pet">Seleccione la Mascota:</label>
					<select id="cita_pet" name="cita_pet" class="form-control">';
					
	while ($pets = mysqli_fetch_array($consulta_pets)){
	echo '<option value="',$pets["pet_name"],'">',$pets["pet_name"],'</option>';
	}
	
	echo '			</select>
					<p></p>
				</div>	
				<div class="form-group col-md-12">
					<p class="help-block">Una vez finalizado el ingreso debera esperar a que el dueño de la mascota acepte el encuentro.</p>
					<button type="submit" class="btn btn-default" name="add_cita">Agregar Cita!</button>
				</div>
			</form>';
?>