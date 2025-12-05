 <?php
 require "../nav.php";
require "../connect.php";
 
 
 // ajouter cours
if (isset($_POST["EnregistrerCours"])) {
    if (!empty($_POST["nomCours"]) && !empty($_POST["categorieCours"]) && !empty($_POST["dateCours"])&& !empty($_POST["heureCours"]) && !empty($_POST["durreCours"]) && !empty($_POST["MaxParticipantCours"]) ){
        $nom=$_POST["nomCours"];
        $categorieCours=$_POST["categorieCours"];
        $dateCours=$_POST["dateCours"];
        $heureCours=$_POST["heureCours"];
        $durreCours=$_POST["durreCours"];
        $MaxParticipantCours=$_POST["MaxParticipantCours"];
        // echo $nom;
    //   echo "les champ sont obligatoire";
    //   echo "nadddddiiiia";
    $sql="INSERT INTO cours(nom,catégorie,dateCours,heure,duree,nombreMaxParticipants) VALUES('$nom','$categorieCours','$dateCours','$heureCours','$durreCours','$MaxParticipantCours')";
    // echo $nom ,$categorieCours , $dateCours,$heureCours,$durreCours,$MaxParticipantCours;

    // $abd=$connet->query($sql);
    if ($connet->query($sql)) {
        // echo "la insertion  reussite";
        header("Location:../index.php");
        exit();
    }
    }
}

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
    
     <!-- Modal Cours -->
     <div id="coursModal" class="flex   items-center justify-center">
        <div class="bg-white p-8 rounded-xl max-w-2xl w-11/12 max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Ajouter un Cours</h2>
                <!-- <button onclick="closeModal('coursModal')"
                class="text-3xl text-gray-400 hover:text-gray-800 border-0 bg-transparent">×</button> -->
            </div>
            <form method="POST" >
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Nom du Cours *</label>
                        <input type="text" placeholder="Ex: Yoga du Matin"  name="nomCours"
                        class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Catégorie *</label>
                        <input type="text" placeholder="Ex: Cardio"  name="categorieCours"
                        class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Date *</label>
                        <input type="date" 
                        class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary"
                        name="dateCours">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Heure *</label>
                        <input type="time" 
                        class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary"
                        name="heureCours">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Durée (minutes) *</label>
                        <input type="number" placeholder="60" 
                        class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary"
                        name="durreCours">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Participants Max *</label>
                        <input type="number" placeholder="20" 
                        class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary"
                        name="MaxParticipantCours">
                    </div>
                </div>
                <div class="mt-6 text-right">
                    <a href="../index.php"
                        class="mr-3 px-5 py-2 bg-red-100 text-red-700 rounded-md transition-all hover:bg-red-700 hover:text-white">
                        Annuler
                    </a>
                    <button type="submit"
                    class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary" name="EnregistrerCours">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>