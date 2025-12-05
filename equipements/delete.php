<?php
require "../connect.php";


// supprimer un equipement
if(isset($_GET['idEqui'])){
// echo "id clicabe : ".$_GET['idEqui'];
$idEqui=$_GET['idEqui'];

$sqlDeleteEqui="DELETE FROM cours_equipements WHERE idE=$idEqui";

$sqlDelete="DELETE FROM equipements WHERE id=$idEqui";

$connet->query($sqlDeleteEqui);
$connet->query($sqlDelete);
if ($connet->query($sqlDelete)) {
    // echo "supprision reusite de id du cours ".$idEqui;
    header("Location: ../index.php");
exit();
}
}

?>