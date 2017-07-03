<?php
session_start();
include 'server.php';

$log = mysql_query("SELECT * FROM petfriends_db.test_db");
if(mysql_query("SELECT p.nombre FROM petfriends_db.test_db as p")) { 
   echo"La Consulta fue exitosa.";
} else { 
   echo "Has tenido el siguiente error:<br />".mysql_error(); 
}
	
while ($row = mysql_fetch_row($log)){
       echo "$row[2]"; 
}
?>