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
	$post_id = $_GET['post_ID'];
	$pet_muro = $_GET['pet_name'];
		
	$query_like = 	"INSERT INTO petfriends_db.likes (like_postId,like_userId)
							VALUES ('$post_id','$user')";						
	$consulta_like = mysqli_query($conexion,$query_like);
	
	
	$query_likes = "	UPDATE petfriends_db.posts as p
						SET p.post_likes = p.post_likes + 1
						WHERE p.post_id = '$post_id'";
	$consulta_likes = mysqli_query($conexion,$query_likes);
	
	
	echo '<script>window.location="/PETFRIENDS/html/pet/pet_wall.php?pet_name=',$pet_muro,'";</script>';
?>
</body>
</html>