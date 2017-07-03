<?php  
header("Content-Type: text/html; charset=iso-8859-1");
 $connect = mysqli_connect("localhost", "root", "", "petfriends_db");  
 $output = array();  
 $data = json_decode(file_get_contents("php://input"));  
 $query = "SELECT * FROM breeds WHERE  breed_type=".$data->type_id;  
 $result = mysqli_query($connect, $query);  


 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 }  
 echo json_encode($output);  
 ?>  