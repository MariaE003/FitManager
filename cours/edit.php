 <!-- modal modifier cours -->
    <?php
    require "../nav.php";
    require "../connect.php";
      if(isset($_GET['idEditCours'])){
        // $javascript = 
        // echo "<script>openModal('updatecoursModal')</script>";
        // embedJavaScript($javascript);
// /echo "id clicabe : ".$_GET['id'];
$id=$_GET['idEditCours'];
// echo $id;
$sqlUpdate="SELECT * FROM cours WHERE id=$id";

$test=$connet->query($sqlUpdate);
$abc=$test->fetch_all(MYSQLI_ASSOC);

foreach($abc as $cours){
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
   $id= $_POST["idCours"];
    
    $nomCour=$_POST["nomCoursAmodifier"];
    $categorieCour=$_POST["categorieCoursAmodifier"];
    $dateCours=$_POST["dateCoursAmodifier"];
    $heureCour=$_POST["heureCoursAmodifier"];
    $durreCour=$_POST["durreCoursAmodifier"];
    $MaxPartici=$_POST["MaxParticipantCoursAmodifier"];

 $update="UPDATE cours SET nom='$nomCour',catégorie='$categorieCour',dateCours='$dateCours',heure='$heureCour',duree='$durreCour',nombreMaxParticipants='$MaxPartici'  WHERE id=$id";
//  $exec=$connet->query($update);
 if ($connet->query($update)) {
    header("Location:../index.php");
    exit();
 }
}

    ?>
    <div id="updatecoursModal" class="flex items-center justify-center">
        <div class="bg-white p-8 rounded-xl max-w-2xl w-11/12 max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Modifier un Cours</h2>
                <!-- <button onclick="closeModal('updatecoursModal')"
                    class="text-3xl text-gray-400 hover:text-gray-800 border-0 bg-transparent">×</button> -->
            </div>
            <form method="POST">
                <input type="hidden" name="idCours" value="<?php echo $cours['id']; ?>">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Nom du Cours *</label>
                        <input type="text" placeholder="Ex: Yoga du Matin"  name="nomCoursAmodifier" value="<?php echo $cours['nom'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Catégorie *</label>
                        <input type="text" placeholder="Ex: Cardio"  name="categorieCoursAmodifier" value="<?php echo $cours['catégorie'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Date *</label>
                        <input type="date" value="<?php echo $cours['dateCours'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary"
                            name="dateCoursAmodifier">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Heure *</label>
                        <input type="time" value="<?php echo $cours['heure'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary"
                            name="heureCoursAmodifier">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Durée (minutes) *</label>
                        <input type="number" placeholder="60" value="<?php echo $cours['duree'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary"
                            name="durreCoursAmodifier">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Participants Max *</label>
                        <input type="number" placeholder="20" value="<?php echo $cours['nombreMaxParticipants'] ?>"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary"
                            name="MaxParticipantCoursAmodifier">
                    </div>
                </div>
                <div class="mt-6 text-right">
                    <a href="../index.php"
                        class="mr-3 px-5 py-2 bg-red-100 text-red-700 rounded-md transition-all hover:bg-red-700 hover:text-white">
                        Annuler
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary" name="modifier">
                        modifier
                    </button>
                </div>
            </form>
        </div>
    </div>

  

</body>