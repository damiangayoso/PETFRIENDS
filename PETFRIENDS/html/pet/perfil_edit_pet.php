<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../css/estilo.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="angular.min.js"></script>
</head>
<body>
					<form method="post" action="/PETFRIENDS/includes/editar_pet.php?pet_name=<?php $pet = $_GET['pet_name'];echo $pet;?>" enctype="multipart/form-data">			
					<div ng-app="myapp" ng-controller="controlador" ng-init="loadtipo()" class="form-group col-md-12">  
				 	 <label for="tipo">Tipo:</label>	
                     <select name="tipo" ng-model="tipo" ng-change="loadraza()" class="form-control" placeholder="Tipo">  
                          <option value="">Seleccione Tipo de Mascota</option>  
                          <option ng-repeat="tipo in tipos" value="{{tipo.type_id}}">{{tipo.type_description}}</option></select>  
                     
                     <label for="tipo">Raza:</label>     	
                     <select name="raza_m" ng-model="raza_m" class="form-control" placeholder="Raza">  
                          <option value="">Seleccione Raza</option>  
                          <option ng-repeat="raza in razas" value="{{raza.breed_id}}">  
                               {{raza.breed_description}}  
                          </option>  
                     </select> 
					</div>			
					<div class="form-group col-md-12">
						<label for="edit_pet_edad">Edad Aproximada:</label>
						<select id="edit_pet_edad" class="form-control" name="edit_pet_edad">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
						</select>
					</div>
					<div class="form-group col-md-12">
						<label for="edit_pet_tamano">Tamaño:</label>
						<select id="edit_pet_tamano" class="form-control" name="edit_pet_tamano">
							<option>Bajo</option>
							<option>Mediano</option>
							<option>Grande</option>
						</select>
					</div>
					<div class="form-group col-md-12">
						<label>Sexo:</label>
						<p>
						<label>
							<input type="radio" name="pet_sexo_options" id="pet_sexo_masculino" value="Masculino"> Masculino
						</label>
						<label>
							<input type="radio" name="pet_sexo_options" id="pet_sexo_femenino" value="Femenino"> Femenino
						</label>
						</p>
					</div>
					<div class="form-group col-md-12">
						<label for="pet_foto_perfil">Agregar Foto de Perfil:</label>
						<input type="file" id="pet_foto_perfil" name="pet_foto_perfil">
						<p class="help-block">Solo se permiten extensiones .jpg .png.</p>
					</div>
					<div class="form-group col-md-12">
						<button type="submit" class="btn btn-default">Guardar Cambios</button>
					</div>
				</form>

</body>
</html>
<script>  
 var app = angular.module("myapp",[]);  
 app.controller("controlador", function($scope, $http){  
      $scope.loadtipo = function(){  
           $http.get("load_tipo.php")  
           .success(function(data){  
                $scope.tipos = data;  
           })  
      }  
      $scope.loadraza = function(){  
           $http.post("load_raza.php", {'type_id':$scope.tipo})  
           .success(function(data){  
                $scope.razas = data;  
           });  
      }  
 });  
 </script>    