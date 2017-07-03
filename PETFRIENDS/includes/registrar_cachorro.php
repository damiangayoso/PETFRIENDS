<?php
session_start();
?>

<html>
<head></head>
<body>
<?php
$raiz = $_SERVER['DOCUMENT_ROOT'];
require $raiz.'/PETFRIENDS/includes/base_de_datos.php';
$puppy_id = $_GET['puppy_id'];
$puppy_userId = $_GET['puppy_userId'];
$user = $_SESSION["user"]["user_id"];
$status= "ADOPTADA";
$query_update = "UPDATE petfriends_db.puppies as puppies
				SET puppies.puppy_status = '$status'
				WHERE puppies.puppy_userId = '$puppy_userId'
				AND puppies.puppy_id = '$puppy_id'";
$consulta_update = mysqli_query($conexion,$query_update);
echo '<script>window.location="/PETFRIENDS/html/pet/cachorros.php";</script>';

?>
</body>
</html>