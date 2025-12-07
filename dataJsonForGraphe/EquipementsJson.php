<?php
require '../connect.php';

$sql="SELECT typeEqui,COUNT(*) as total FROM equipements GROUP BY typeEqui";
// $sql="SELECT * FROM equipements ";
$test=$connet->query($sql);
$data=$test->fetch_all(MYSQLI_ASSOC);
// foreach($data as $data){
//     echo $data["nom"],$data["typeEqui"];
// }

print json_encode($data);


?>