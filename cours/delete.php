<?php 
require "../connect.php";


// supprimer un cours
if(isset($_GET['id'])){
// echo "id clicabe : ".$_GET['id'];
$id=$_GET['id'];
$sqlDeleteEqui="DELETE FROM cours_equipements WHERE idC=$id";
$sqlDeleteCours="DELETE FROM cours WHERE id=$id";
$connet->query($sqlDeleteEqui);
$connet->query($sqlDeleteCours);
if ($connet->query($sqlDeleteCours)) {
    // echo "supprision reusite de id du cours ".$_GET['id'];
     header("Location:../cours.php");
        exit();
}
}
?>