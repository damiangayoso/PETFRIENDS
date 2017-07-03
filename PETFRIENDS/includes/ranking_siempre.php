<?php

$pet_name = $_GET['pet_name'];
$user = $_GET['user_pet_id'];

$query_petNfo = 	"SELECT *
					FROM petfriends_db.pets as pets INNER JOIN petfriends_db.type as type
					ON type.type_id = pets.pet_type
					WHERE pets.pet_name = '$pet_name'
					AND pets.pet_idUser = '$user'";
$consulta_petNfo = mysqli_query($conexion,$query_petNfo);
$petNfo = mysqli_fetch_array($consulta_petNfo);					
$pet_tipo = $petNfo["pet_type"];

//SUPER CONSULTA, LA VALORACION TOTAL SE DETERMINA POR LA CANTIDAD DE VISITAS TOTAL DE LOS POSTS DE LA MASCOTA
//SUMADO A LOS LIKES (MULTIPLICADOS POR 2 PARA MAS VALORACION QUE UNA VISITA)
//SUMADO A LA CANTIDAD DE SEGUIDORES (MULTIPLICADOS POR 10 PARA MAS VALORACION QUE UNA VISITA O UN LIKE)

$query_valoracion = "SELECT posts.post_petId, (SUM(posts.post_views) + (SUM(posts.post_likes)*2) + (follows.seguidores * 10)) as Total, pets.pet_name
					FROM	(SELECT contacts.contact_petB as pet_id ,COUNT(contacts.contact_petB) as seguidores
							FROM petfriends_db.contacts as contacts
							WHERE contacts.contact_petB IN (	SELECT pets.pet_id
																FROM petfriends_db.pets as pets
																WHERE pets.pet_type = '$pet_tipo')
							GROUP BY contacts.contact_petB) as follows 
					INNER JOIN petfriends_db.posts as posts
					ON follows.pet_id = posts.post_petId
					INNER JOIN petfriends_db.pets as pets
					ON posts.post_petId = pets.pet_id
					WHERE posts.post_petId IN (	SELECT pets.pet_id
												FROM petfriends_db.pets as pets
												WHERE pets.pet_type = '$pet_tipo')
					GROUP BY posts.post_petId
					ORDER BY Total DESC
					LIMIT 10";
$consulta_valoracion = mysqli_query($conexion,$query_valoracion);

echo '
<script type="text/javascript">

Highcharts.chart(\'container_siempre\', {
    chart: {
        type: \'column\'
    },
    title: {
        text: \'Ranking Top 10 de ',$petNfo["type_description"],'s (Desde el Inicio del tiempo)\'
    },
    subtitle: {
        text: \'\'
    },
    xAxis: {
        categories: [
            \'Mascotas\'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: \'Valoracion de Mascota\'
        }
    },
    tooltip: {
        headerFormat: \'<span style="font-size:10px">{point.key}</span><table>\',
        pointFormat: \'<tr><td style="color:{series.color};padding:0">{series.name}: </td>\' +
            \'<td style="padding:0"><b>{point.y:.1f} Puntos</b></td></tr>\',
        footerFormat: \'</table>\',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [';
	
	while ($valoracion = mysqli_fetch_array($consulta_valoracion)){
		echo '{name: \'',$valoracion["pet_name"],'\', data: [',$valoracion["Total"],']},';
	}
		
	echo ']});</script>';

?>
