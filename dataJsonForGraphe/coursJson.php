<?php
require "../connect.php";




 $test = "SELECT catégorie,count(*) as total FROM cours group by catégorie";
//  echo $test;

        $data = $connet->query($test);
        $data1 = $data->fetch_all(MYSQLI_ASSOC);

     
        //converti array php en json
        print json_encode($data1);
?>