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
	<header class="col-md-12 bg-header">
		<div class="col-md-4">
			<img src="/PETFRIENDS/images/logo_petfriends.png" width="200px">
		</div>
		<div class="col-md-4 buscador">
			<form class="form-inline" method="post" action="http://localhost/PETFRIENDS/html/pet/pet_busqueda.php">
				<div class="form-group">
					<label for="buscador">Buscar:</label>
					<input type="text" class="form-control" id="buscador" name="buscar" placeholder="Escribe Aqui...">
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</div>
			</form>
		</div>
		<div class="col-md-4">
		<div class="col-md-12">
			<div class="btn-group">
			  <button type="button" class="dropdown-toggle menu_header" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php require $raiz.'/PETFRIENDS/includes/user_nombre.php'; ?> <span class="caret"> </span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="/PETFRIENDS/html/user/perfil_user.php">Mi Perfil</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="/PETFRIENDS/html/pet/add_pet.php">Agregar Mascota</a></li>
				<li><a href="/PETFRIENDS/html/pet/add_perdida.php">Agregar Mascota Perdida</a></li>
				<li><a href="/PETFRIENDS/html/pet/add_adopcion.php">Agregar Mascota en Adopcion</a></li>
				<li><a href="/PETFRIENDS/html/pet/add_cachorro.php">Agregar Cachorros en Adopcion</a></li>
				<li><a href="/PETFRIENDS/html/pet/add_cruce.php">Agregar Cruce de Mascotas</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="/PETFRIENDS/includes/logout.php">Salir</a></li>
			  </ul>
			  <?php require $raiz.'/PETFRIENDS/includes/user_mini_foto.php'; ?>
			</div>
		</div>
		</div>
	</header>
	
	<article class="bg-article col-md-12 row equal">
		<div class="col-md-3" style="background-color:#ffffff;">
			<?php require $raiz.'/PETFRIENDS/includes/menu_izquierda.php'; ?>
		</div>
		<div class="col-md-6" style="background-color:white;padding:0px;">
			<ul class="nav nav-tabs nav-justified">
				<li role="presentation"><a href="../user/perfil_user.php">USUARIO</a></li>
				<li role="presentation" class="active"><a href="#">Agregar Mascota</a></li>
				<li role="presentation"><a href="del_pet.php">Eliminar Mascota</a></li>
			</ul>
			<div class="col-md-12" style="border-style:solid;border-top:1px;border-color:#CCCCCC;border-width:1px;padding-top:20px;">
				<form method="post" action="/PETFRIENDS/includes/registrar_pet.php" enctype="multipart/form-data">
					<div class="form-group col-md-12">
						<label for="reg_pet_nombre">Nombre:</label>
						<input type="text" class="form-control" id="reg_pet_nombre" name="reg_pet_nombre" placeholder="Nombre">
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
						<label for="reg_pet_edad">Edad Aproximada:</label>
						<select id="reg_pet_edad" class="form-control" name="reg_pet_edad">
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
						<label for="reg_pet_tamano">Tamaño:</label>
						<select id="reg_pet_tamano" class="form-control" name="reg_pet_tamano">
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
						<button type="submit" class="btn btn-default">Agregar Mascota</button>
					</div>
				</form>
			</div>
			
		</div>
	<div class="col-md-3 text-center" style="background-color:#ffffff;">
	<img src="../../images/banner_1.jpg" style="padding-bottom: 10px;padding-top:10px;">
	<img src="../../images/banner_2.jpg" style="padding-bottom: 10px;padding-top:10px;">
	</div>
				
		
	</article>
	
	<footer class="col-md-12 bg-footer">
	<center style="color:#ffffff;">Trabajo Practico Final para la materia Programacion Web II</center>
	<center style="color:#ffffff;">::Integrantes::</center>
	<center style="color:#ffffff;">Juan Sanchez, Damian Gayoso Cuesta</center>
	</footer>
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

