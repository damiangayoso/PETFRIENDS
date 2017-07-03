<?php
$user_email = $_SESSION["user"]["user_email"];
$query_geo = "SELECT *
			FROM petfriends_db.users as users
			WHERE users.user_email = '$user_email'";
$consulta_geo = mysqli_query($conexion,$query_geo);
$geo = mysqli_fetch_array($consulta_geo);
$lat_geo = $geo["user_lat"];
$lon_geo = $geo["user_lon"];

echo '<div id="gmapa" class="col-md-12 text-center" style="width:500px; height:500px;background-color:#000000;"></div>
				
				<script type="text/javascript">
				
				var divMapa = document.getElementById(\'gmapa\');
				navigator.geolocation.getCurrentPosition(fn_ok,fn_error)
				function fn_error(){}
				function fn_ok(respuesta){
										
					var latLon = new google.maps.LatLng('.$lat_geo.','.$lon_geo.');
					var objConfig = {
							zoom: 12,
							center: latLon
					}
					
					var gmap = new google.maps.Map(divMapa,objConfig);
					
					var objConfigMarker = {
							position: latLon,
							map: gmap,
							title: "Mi Ubicacion"
					}
					
					var gmarker = new google.maps.Marker(objConfigMarker)
				}
				
				</script>
		';		
?>