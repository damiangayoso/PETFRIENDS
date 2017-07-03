<?php
	$user = $_SESSION["user"]["user_id"];
	$pet_nombre = $_GET['pet_name'];
	$pet_user_id = $_GET['user_pet_id'];
	
	//OBTENGO EL ID DE LA MASCOTA
	$query_petId = 	"SELECT *
					FROM petfriends_db.users as users INNER JOIN petfriends_db.pets as pets
					ON users.user_id = pets.pet_idUser
					WHERE pets.pet_idUser = '$pet_user_id'
					AND pets.pet_name = '$pet_nombre'";
	$consulta_petId = mysqli_query($conexion,$query_petId);
	$pet_muroId = mysqli_fetch_array($consulta_petId);
	$pet_idMain = $pet_muroId["pet_id"];
	
	//CONSULTA QUE REVISA LOS CONTACTOS DE LA MASCOTA Y TRAE LOS POSTS DE TODOS
	$query_post = "	SELECT *
							FROM 	petfriends_db.posts as pdb	INNER JOIN petfriends_db.users as users
							ON pdb.post_userId = users.user_id INNER JOIN petfriends_db.pets as pets
							ON pets.pet_id = pdb.post_petId
							WHERE pdb.post_petId IN	(SELECT contacts.contact_petB
													FROM petfriends_db.contacts as contacts
													WHERE contacts.contact_userA = '$pet_user_id')
							OR pdb.post_petId = '$pet_idMain'
							ORDER BY pdb.post_date DESC";
	
	$consulta_post = mysqli_query($conexion,$query_post);
	
	//PESTAÑAS 
	
	echo '		<ul class="nav nav-tabs nav-justified">
					<li role="presentation" class="active"><a href="#">Muro</a></li>
					<li role="presentation"><a href="','/PETFRIENDS/html/pet/other_perfil_pet.php?pet_name=',$pet_nombre,'&user_pet_id=',$pet_user_id,'">Perfil Mascota</a></li>
				</ul>
				<div class="col-md-12" style="border-style:solid;border-top:1px;border-color:#CCCCCC;border-width:1px;padding-top:20px;">
				<div class="col-md-12">';
				
	echo '<div class="col-md-12" style="border-style:solid;border-color:#CCCCCC;border-width:1px;padding:0px;margin-bottom:5px;">';
	
	//COMIENZA BUSQUEDA DE POSTS
	
	if(mysqli_num_rows($consulta_post)>0){

	while ($post = mysqli_fetch_array($consulta_post)){
	
	echo '
				<div class="col-md-1" style="background-color:#79A8B1;height:55px;"><p><img src="',$post["pet_photo"],'" width="40px"></p></div>
					<div class="col-md-11" style="background-color:#79A8B1">
						<h4 style="height:5px;"><a href="/PETFRIENDS/html/pet/other_perfil_pet.php?pet_name=',$post["pet_name"],'&user_pet_id=',$post["post_userId"],'" style="color:#ffffff;">',$post["pet_name"],' </a><small>(',$post["user_firstName"],')</small></h4>
						<p style="color:#ffffff;">',$post["post_date"],'</p>
					</div>
					<div class="col-md-12"><p>';
					
					//COMIENZO FILTROS PARA YOUTUBE
					$yt_watch = "watch?v=";
					$yt_be = "youtu.be/";
					$post["post_description"] = str_replace ( $yt_watch , "embed/" , $post["post_description"]);
					$post["post_description"] = str_replace ( $yt_be , "www.youtube.com/embed/" , $post["post_description"]);
					$post["post_description"] = preg_replace("/((http|https|www)[^\s]+)/", '<p><iframe width="525" height="315" src="$1" frameborder="0" allowfullscreen>$0</iframe></p>', $post["post_description"]);
					$post["post_description"] = preg_replace("/href=\"www/", 'href="http://www', $post["post_description"]);

	echo $post["post_description"],'</p></div>';
					
	//BOTONES: LIKE & COMENTAR
	$post_ID = $post["post_id"];
	$query_likes = "SELECT *
					FROM petfriends_db.likes as likes
					WHERE likes.like_userId = '$user'
					AND likes.like_postId = '$post_ID'";
	$consulta_likes = mysqli_query($conexion,$query_likes);
		
	echo '<div class="col-md-12" align="right">';
	
	//VERIFICO SI EL USUARIO LOGEADO YA DIO LIKE EN ESTE POST
	
	if(mysqli_num_rows($consulta_likes)>0){
		echo '<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="color:green;">',$post["post_likes"],'';
		//SWITCH QUE DETERMINA EL TIPO DE ANIMAL 
		switch ($post["pet_type"]) {
			case "1":
				echo 'Guauuu! </span> ';
				break;
			case "2":
				echo 'Miauuu! </span> ';
				break;
			case "3":
				echo 'Pioooo! </span> ';
				break;
			case "5":
				echo 'Oinkkk! </span> ';
				break;
			default:
				echo 'Like! </span> ';
		}
	}
	else{
		echo '<a href="/PETFRIENDS/includes/likes.php?post_ID=',$post_ID,'&pet_name=',$pet_nombre,'" style="color:green;"><button type="button" class="btn btn-default btn-lg" style="color:green;">
							<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>';
		switch ($post["pet_type"]) {
			case "1":
				echo ' Guauuu!</button></a> ';
				break;
			case "2":
				echo ' Miauuu!</button></a> ';
				break;
			case "3":
				echo ' Pioooo!</button></a> ';
				break;
			case "5":
				echo ' Oinkkk!</button></a> ';
				break;
			default:
				echo ' Like!</button></a> ';
		}

	}
							
	//SECCION COMENTARIOS
	echo '<button data-toggle="collapse" data-target="#',$post["post_id"],'" class="btn btn-default btn-lg">
	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Comentar!
	</button>
	<p></p>
	<div id="',$post["post_id"],'" class="collapse col-md-12">
	
	<form method="post" action="/PETFRIENDS/includes/comentar.php?post_commentId=',$post["post_id"],'&pet_name=',$pet_nombre,'">
	<p></p>
	<div class="form-group">
	<label for="comentario">Escribe tu Comentario:</label>
	<textarea class="form-control" rows="5" name="texto_comentario" id="comentario"></textarea>
	<p></p>
	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span> Enviar!</button>
	</div>
	</form>
	</div>	
	</div>
	';
	
	// CONTADOR DE VISITAS
	
	$views_update = $post["post_views"] + 1;
	$post_id = $post["post_id"];
	$query_views = "	UPDATE petfriends_db.posts as p
						SET p.post_views = $views_update
						WHERE p.post_id = '$post_id'";
	$consulta_views = mysqli_query($conexion,$query_views);
	
	// COMIENZO PRIMER CONSULTA DE COMENTARIOS
	
	$post_id = $post["post_id"];
	$query_comment = "	SELECT *
						FROM petfriends_db.posts as posts INNER JOIN petfriends_db.comments as comments
						ON posts.post_id = comments.comment_postId INNER JOIN petfriends_db.users as users
						ON users.user_id = comments.comment_userId
						WHERE posts.post_id = '$post_id'
						ORDER BY comments.comment_date DESC";
	$consulta_comment = mysqli_query($conexion,$query_comment);
	
	if(mysqli_num_rows($consulta_comment)>0){
		
	$comment = mysqli_fetch_array($consulta_comment);
	echo '	<div class="col-md-12" style="background-color:#EEEEEE;padding:1px;" align="right">
						<h4 style="height:3px;">',$comment["user_firstName"],'<small>(USUARIO_NAME)</small></h4>
						<p>',$comment["comment_date"],'</p>
						<p style="background-color:#ffffff;">',$comment["comment_description"],'</p>
			</div>';
	while ($comment = mysqli_fetch_array($consulta_comment)){
		echo '	<div class="col-md-12" style="background-color:#EEEEEE;padding:1px;" align="right">
						<h4 style="height:3px;">',$comment["user_firstName"],'<small>(USUARIO_NAME)</small></h4>
						<p>',$comment["comment_date"],'</p>
						<p style="background-color:#ffffff;">',$comment["comment_description"],'</p>
			</div>';
	}
	
	}
		}
	}
	echo '</div></div></div>';
?>