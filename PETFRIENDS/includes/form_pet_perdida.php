<?php
	$email = $_SESSION["user"]["user_email"];
	$query_pets = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'";
	$consulta_pets = mysqli_query($conexion,$query_pets);
	
	echo '<form method="post" action="/PETFRIENDS/includes/pet_perdida_add.php">	
				<div class="form-group col-md-12">
					<label for="perdida_pet">Seleccione la Mascota que se a perdido:</label>
					<select id="perdida_pet" name="perdida_pet" class="form-control">';
					
	while ($pets = mysqli_fetch_array($consulta_pets)){
	echo '<option value="',$pets["pet_name"],'">',$pets["pet_name"],'</option>';
	}
	
	echo '			</select>
					<p></p>
					<label for="perdida_descripcion">Describa la situacion en la cual perdio a su mascota (Zona, Fecha, caracteristicas de la mascota):</label>
					<textarea class="form-control" rows="5" name="perdida_descripcion" id="perdida_descripcion"></textarea>
				</div>	
				<div class="form-group col-md-12">
					<p class="help-block">Una vez finalizado el ingreso, podra imprimir un PDF para repartir en la seccion MASCOTAS PERDIDAS.</p>
					<button type="submit" class="btn btn-default" name="add_perdida">Agregar Mascota Perdida</button>
				</div>
			</form>';
?>