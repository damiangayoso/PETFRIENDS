<?php  
 header("Content-Type: text/html; charset=iso-8859-1");
 $connect = mysqli_connect("localhost", "root", "", "petfriends_db");  
 $output = array();  
 $query = "SELECT type_id,type_description FROM type group by type_id,type_description";  
 $result = mysqli_query($connect, $query);  
 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 }  

echo json_encode($output);  
 ?>  