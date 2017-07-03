<?php
	$email = $_SESSION["user"]["user_email"];
	$query_pets = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'";
	$consulta_pets = mysqli_query($conexion,$query_pets);
	
	echo '<form method="post" action="/PETFRIENDS/includes/pet_cachorro_add.php">';
					
	echo '		<div ng-app="myapp" ng-controller="controlador" ng-init="loadtipo()" class="form-group col-md-12">  
				 	 <label for="tipo">Tipo:</label>	
                     <select name="tipo" ng-model="tipo" ng-change="loadraza()" class="form-control" placeholder="Tipo">  
                          <option value="">Seleccione Tipo de Mascota</option>  
                          <option ng-repeat="tipo in tipos" value="{{tipo.type_id}}">{{tipo.type_description}}</option></select>  
                     
                     <label for="tipo">Raza Madre:</label>     	
                     <select name="raza_m" ng-model="raza_m" class="form-control" placeholder="Raza">  
                          <option value="">Seleccione Raza</option>  
                          <option ng-repeat="raza in razas" value="{{raza.breed_id}}">  
                               {{raza.breed_description}}  
                          </option>  
                     </select> 
					 
					 <label for="tipo">Raza Padre:</label>     	
                     <select name="raza_f" ng-model="raza_f" class="form-control" placeholder="Raza">  
                          <option value="">Seleccione Raza</option>  
                          <option ng-repeat="raza in razas" value="{{raza.breed_id}}">  
                               {{raza.breed_description}}  
                          </option>  
                     </select> 
                </div>	
				<div class="form-group col-md-6">
					<label for="fecha">Fecha de Nacimiento:</label>
					<input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha de Nacimiento">
				</div>
				
				<div class="form-group col-md-12">
					<p class="help-block">Una vez finalizado el ingreso, podra ver sus cachorros en adopcion en la seccion CACHORROS EN ADOPCION.</p>
					<button type="submit" class="btn btn-default" name="add_cachorro">Agregar cachorro en Adopcion</button>
				</div>
			</form>';
?>