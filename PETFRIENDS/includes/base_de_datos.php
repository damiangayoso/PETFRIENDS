<?php
	/*class BaseDeDatos{
		private $servidor;
		private $usuario;
		private $password;
		private $basededatos;
		public $conexion;
		
		public function __construct(){
			$db = parse_ini_file("../config/config.ini");
			$servidor = $db['servidor'];
			$usuario = $db['usuario'];
			$password = $db['password'];
			$basededatos = $db['basededatos'];
			
			//$conexion = mysqli_connect($servidor,$usuario,$password,$basededatos) or die("No se encontro el servidor");
			$conexion = mysqli_connect("localhost","root","","petfriends_db") or die("No se encontro el servidor");
			return $conexion;
		}
	}*/
	$raiz = $_SERVER['DOCUMENT_ROOT'];
	$db = parse_ini_file($raiz."/PETFRIENDS/config/config.ini");
	$servidor = $db['servidor'];
	$usuario = $db['usuario'];
	$password = $db['password'];
	$basededatos = $db['basededatos'];
	$conexion = mysqli_connect($servidor,$usuario,$password,$basededatos) or die("No se encontro el servidor");
?>