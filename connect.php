<?php
$host="localhost";
$dbname="fitmanager";
$username="root";
$password="";
try{
    $connet=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
    // echo "connexion reussite";
     $insert="INSERT INTO cours(nom, catégorie, dateCours, heure, duree, nombreMaxParticipants) values('abc','abcCat','2003-06-12','11',1,15)";
    $connet->exec($insert);
    // echo "new record";
}catch(PDOException $e){
    die("connexion non reussite : ".$e->getMessage());
}

?>