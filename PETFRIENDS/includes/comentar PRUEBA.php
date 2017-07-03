<?php
	session_start();
	$raiz = $_SERVER['DOCUMENT_ROOT'];
	require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
	
	$user = 1;
	$post_id = 1;
	$texto_comentario = "prueba comentar";
	
	$query_comentario = 	"INSERT INTO petfriends_db.comments (comment_postId,comment_userId,comment_description,comment_date)
							VALUES ('$post_id','$user','$texto_comentario',NOW())";
	$consulta_comentario = mysqli_query($conexion,$query_comentario);
	if(mysqli_num_rows($consulta_comentario)>0){
		echo "0 RESULTADOS";
	}
	else{
		echo "FUNCIONA";
	}
?>