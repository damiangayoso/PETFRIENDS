
<?php
	session_start();
	?>
<html>
<head></head>
<body>
<?php
	$raiz = $_SERVER['DOCUMENT_ROOT'];
	require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
	
	$user = $_SESSION["user"]["user_id"];
	$pet_muro = $_GET['pet_name'];
	$post_id = $_GET['post_commentId'];
	$texto_comentario = $_POST['texto_comentario'];
	
	$query_comentario = 	"INSERT INTO petfriends_db.comments (comment_postId,comment_userId,comment_date,comment_description)
							VALUES ('$post_id','$user',NOW(),'$texto_comentario')";
	$consulta_comentario = mysqli_query($conexion,$query_comentario);
	echo '<script>window.location="/PETFRIENDS/html/pet/pet_wall.php?pet_name=',$pet_muro,'";</script>';
?>
</body>
</html>