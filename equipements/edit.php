<?php
require "../nav.php";
require "../connect.php";

      if(isset($_GET['idEquiUpdate'])){
        // $javascript = 
        // echo "<script>openModal('updatecoursModal')</script>";
        // embedJavaScript($javascript);
// /echo "id clicabe : ".$_GET['id'];
$id=$_GET['idEquiUpdate'];
// echo $id;
$sqlUpdate="SELECT * FROM equipements WHERE id=$id";

$test=$connet->query($sqlUpdate);
$abc=$test->fetch_all(MYSQLI_ASSOC);

foreach($abc as $equi){
    // echo $cours["nom"] . $cours["catégorie"] .$cours["dateCours"];

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6', /* Bleu du premier design */
                        secondary: '#1e40af',
                    }
                }
            }
        }
    </script>
 </head>
 <body>

     <?php
    }
}
if (isset($_POST['modifier'])) {
//    $id= $_POST["idCours"];
    
    $nom=$_POST["nom"];
    $type=$_POST["type"];
    $quantite=$_POST["quantite"];
    $etat=$_POST["etat"];
    // $durreCour=$_POST["durreCoursAmodifier"];
    // $MaxPartici=$_POST["MaxParticipantCoursAmodifier"];

 $update="UPDATE equipements SET nom='$nom',typeEqui='$type',quantiteDispo='$quantite',etat='$etat' WHERE id=$id";
//  $exec=$connet->query($update);
 if ($connet->query($update)) {
    header("Location:../index.php");
    exit();
 }
}

    ?>

 <div id="equipementModal" class="flex items-center justify-center">
        <div class="bg-white p-8 rounded-xl max-w-2xl w-11/12 max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Modifier un Équipement</h2>
                <!-- <button onclick="closeModal('equipementModal')"
                    class="text-3xl text-gray-400 hover:text-gray-800 border-0 bg-transparent">×</button> -->
            </div>
            <form method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Nom de l'Équipement *</label>
                        <input type="text" placeholder="Ex: Tapis de Course" required name ="nom" value="<?php echo $equi['nom'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Type *</label>
                        <select required name="type" value="<?php echo $equi['typeEqui'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                            <option value="">Sélectionner...</option>
                            <option>Cardio</option>
                            <option>Musculation</option>
                            <option>Yoga</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Quantité *</label>
                        <input type="number" placeholder="10" required name="quantite" value="<?php echo $equi['quantiteDispo'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">État *</label>
                        <select required name="etat" value="<?php echo $equi['etat'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                            <option value="">Sélectionner...</option>
                            <option>Bon</option>
                            <option>Moyen</option>
                            <option>À remplacer</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 text-right">
                    <a href="../index.php"
                        class="mr-3 px-5 py-2 bg-red-100 text-red-700 rounded-md transition-all hover:bg-red-700 hover:text-white">
                        Annuler
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary" name="modifier">
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>


    </body>

