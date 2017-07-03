<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="angular.min.js"></script>  
</head>
<body>

<div class="form-group col-md-12" ng-app="myapp" ng-controller="controlador" ng-init="loadtipo()">  

      <select name="tipo" ng-model="tipo" ng-change="loadraza()">  
                          <option value="">Seleccione Tipo de Mascota</option>  
                          <option ng-repeat="tipo in tipos" value="{{tipo.type_id}}">{{tipo.type_description}}</option>
      </select>  
                     <br />  
      <select name="raza" ng-model="raza">  
                          <option value="">Seleccione la Raza</option>  
                          <option ng-repeat="raza in razas" value="{{raza.breed_id}}">  
                               {{raza.breed_description}}  
                          </option>  
      </select> 
                  
</div> 


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
