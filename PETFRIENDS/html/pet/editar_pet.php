<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
if(isset($_SESSION["user"])){
	echo '';
}
else{
	echo '<script>window.location="../../index.php";</script>'; //si intentan entrar a perfil_user.php sin logear los redirige a index.php
}
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../css/estilo.css"/>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="angular.min.js"></script>
	<title></title>
</head>
<body>
<header class="col-md-12 bg-header">
		<div class="col-md-4">
			<img src="/PETFRIENDS/images/logo_petfriends.png" width="200px">
		</div>
		
</header>

<form method="post" enctype="multipart/form-data" action="/PETFRIENDS/includes/editar_mascota.php">
					<div class="form-group col-md-12">
						<label for="edit_user_nombre">Nombre:</label>
						<input type="text" class="form-control" id="edit_pet_nombre" name="edit_pet_nombre" placeholder="Nombre">
					</div>

					<div ng-app="myapp" ng-controller="controlador" ng-init="loadtipo()" class="form-group col-md-12">  

				 	 <label for="tipo">Tipo:</label>	
                     <select name="tipo" ng-model="tipo" ng-change="loadraza()" class="form-control" placeholder="Tipo">  
                          <option value="">Seleccione Tipo de Mascota</option>  
                          <option ng-repeat="tipo in tipos" value="{{tipo.type_id}}">{{tipo.type_description}}</option></select>  
                     
                     <label for="tipo">Raza:</label>     	
                     <select name="raza" ng-model="raza" class="form-control" placeholder="Raza">  
                          <option value="">Seleccione Raza</option>  
                          <option ng-repeat="raza in razas" value="{{raza.breed_id}}">  
                               {{raza.breed_description}}  
                          </option>  
                     </select> 
                  </div>				


					
					<div class="form-group col-md-12">
					<label for="edit_pet_edad">Edad:</label>
					<input type="text" class="form-control" id="edit_pet_edad" name="edit_pet_edad" placeholder="Edad">
					</div>
					
					<div class="form-group col-md-12">
						<label>Sexo:</label>
							<label>						
							<input type="radio" name="edit_pet_sexo" id="edit_pet_sexo" value="male"> Masculino 
							</label>
							<label>
							<input type="radio" name="edit_pet_sexo" id="edit_pet_sexo" value="female"> Femenino
							</label>	
							
					</div>
					<div class="form-group col-md-12">
						<label for="edit_photo">Agregar Foto de Perfil:</label>
						<input type="file" id="edit_pet_photo" name="edit_pet_photo">
						<p class="help-block">Solo se permiten extensiones .jpg .png.</p>
					</div>
					<div class="form-group col-md-12">
						<button type="submit" class="btn btn-default"  >Guardar Cambios</button>
						<button type="button" class="btn btn-default" onclick="cerrar()">Cancelar</button>
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
