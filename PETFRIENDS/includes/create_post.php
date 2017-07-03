<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
$user_email = $_SESSION["user"]["user_email"];
$user = $_SESSION["user"]["user_id"];
$texto_post = $_POST['texto_post'];
$pet_nombre = $_GET['pet_name']; 


if($img_nombre = $_FILES['imagen_post']['name']){
	
$img_nombre = $_FILES['imagen_post']['name'];
$img_tipo = $_FILES['imagen_post']['type'];
$img_tamano = $_FILES['imagen_post']['size'];
$filtro_jpg = strpos($img_nombre,".jpg");
$filtro_png = strpos($img_nombre,".png");
if($filtro_jpg ||  $filtro_png){	
				//HAGO UNA CONSULTA PARA DETERMINAR EL NRO DE POSTS SIGUIENTE PARA COMBINARLO CON LA CARPETA QUE SE CREARA, 
				//ESTO ES PARA EVITAR QUE EN ALGUN MOMENTO SE GENEREN DOS POSTS EN EL MISMO SITIO
				$query_postId = "SELECT MAX(posts.post_id) as max
								FROM petfriends_db.posts as posts
								";
				$consulta_postId = mysqli_query($conexion,$query_postId);
				$ultimo_post = mysqli_fetch_array($consulta_postId);
				$folder_name = $ultimo_post["max"] + 1;

				$directorio = $raiz.'/PETFRIENDS/resources/'.$user_email.'/'.$pet_nombre.'/'.$folder_name.'/';
				$segundo_directorio = '/PETFRIENDS/resources/'.$user_email.'/'.$pet_nombre.'/'.$folder_name.'/';

				if (!file_exists($directorio)) {
					mkdir($directorio, 0777, true);
				}

				move_uploaded_file($_FILES['imagen_post']['tmp_name'],$directorio.$img_nombre);

				$texto_final = '<p style="padding-left:20px;"><img src="'.$segundo_directorio.$img_nombre.'" width="450px"></p>'.$texto_post;

				// SABER ID DE LA PET
				$query_petId = 	"SELECT *
									FROM petfriends_db.users as users INNER JOIN petfriends_db.pets as pets
									ON users.user_id = pets.pet_idUser
									WHERE pets.pet_idUser = '$user'
									AND pets.pet_name = '$pet_nombre'";
					$consulta_petId = mysqli_query($conexion,$query_petId);
					$pet_id = mysqli_fetch_array($consulta_petId);
					$pet_id = $pet_id["pet_id"];


				//INSERTO TODOS LOS VALORES EN LA TABLA POSTS
				$query_post = 	"INSERT INTO petfriends_db.posts (post_petId,post_userId,post_date,post_description,post_views,post_likes)
								VALUES ('$pet_id','$user',NOW(),'$texto_final',1,1)";
				$consulta_post = mysqli_query($conexion,$query_post);
				//VUELVO A LA PAGINA ANTERIOR
				echo '<script>window.location="/PETFRIENDS/html/pet/pet_create_post.php?pet_name=',$pet_nombre,'";</script>';
		

}
else{
	$_SESSION["error_img"] = 1;
	echo '<script>window.location="/PETFRIENDS/html/pet/pet_create_post.php?pet_name=',$pet_nombre,'";</script>';
}
}
else
{

				//HAGO UNA CONSULTA PARA DETERMINAR EL NRO DE POSTS SIGUIENTE PARA COMBINARLO CON LA CARPETA QUE SE CREARA, 
				//ESTO ES PARA EVITAR QUE EN ALGUN MOMENTO SE GENEREN DOS POSTS EN EL MISMO SITIO
				$query_postId = "SELECT MAX(posts.post_id) as max
								FROM petfriends_db.posts as posts
								";
				$consulta_postId = mysqli_query($conexion,$query_postId);
				$ultimo_post = mysqli_fetch_array($consulta_postId);
				$folder_name = $ultimo_post["max"] + 1;

				$directorio = $raiz.'/PETFRIENDS/resources/'.$user_email.'/'.$pet_nombre.'/'.$folder_name.'/';
				$segundo_directorio = '/PETFRIENDS/resources/'.$user_email.'/'.$pet_nombre.'/'.$folder_name.'/';

				if (!file_exists($directorio)) {
					mkdir($directorio, 0777, true);
				}

				$texto_final = $texto_post;

				// SABER ID DE LA PET
				$query_petId = 	"SELECT *
									FROM petfriends_db.users as users INNER JOIN petfriends_db.pets as pets
									ON users.user_id = pets.pet_idUser
									WHERE pets.pet_idUser = '$user'
									AND pets.pet_name = '$pet_nombre'";
					$consulta_petId = mysqli_query($conexion,$query_petId);
					$pet_id = mysqli_fetch_array($consulta_petId);
					$pet_id = $pet_id["pet_id"];


				//INSERTO TODOS LOS VALORES EN LA TABLA POSTS
				$query_post = 	"INSERT INTO petfriends_db.posts (post_petId,post_userId,post_date,post_description,post_views,post_likes)
								VALUES ('$pet_id','$user',NOW(),'$texto_final',1,1)";
				$consulta_post = mysqli_query($conexion,$query_post);
				//VUELVO A LA PAGINA ANTERIOR
				echo '<script>window.location="/PETFRIENDS/html/pet/pet_create_post.php?pet_name=',$pet_nombre,'";</script>';
}
?>