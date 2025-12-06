<?php
require "../session.php";
require "../nav.php";
require "../connect.php";

// ajouter equipement
if (isset($_POST["EnregistrerEqui"])) {
    if (!empty($_POST["nom"]) && !empty($_POST["type"]) && !empty($_POST["quantite"]) && !empty($_POST["etat"])){
        $nom=$_POST["nom"];
        $typeE=$_POST["type"];
        $quantite=$_POST["quantite"];
        $etat=$_POST["etat"];
       
        // echo $nom;
    //   echo "les champ sont obligatoire";
    //   echo "nadddddiiiia";
    
    $sql="INSERT INTO equipements(nom,typeEqui,quantiteDispo,etat) VALUES('$nom','$typeE','$quantite','$etat')";
    // echo $nom ,$categorieCours , $dateCours,$heureCours,$durreCours,$MaxParticipantCours;

    // $abd=$connet->query($sql);
    if ($connet->query($sql) === true) {
        // echo "la insertion  reussite";
        header("Location:../equipements.php");
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
   
    <div id="equipementModal" class="flex items-center justify-center">
        <div class="bg-white p-8 rounded-xl max-w-2xl w-11/12 max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Ajouter un Équipement</h2>
                <!-- <button onclick="closeModal('equipementModal')"
                    class="text-3xl text-gray-400 hover:text-gray-800 border-0 bg-transparent">×</button> -->
            </div>
            <form method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Nom de l'Équipement *</label>
                        <input type="text" placeholder="Ex: Tapis de Course" required name ="nom"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Type *</label>
                        <select required name="type"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                            <option value="">Sélectionner...</option>
                            <option>Cardio</option>
                            <option>Musculation</option>
                            <option>Yoga</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Quantité *</label>
                        <input type="number" placeholder="10" required name="quantite"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">État *</label>
                        <select required name="etat"
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
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary" name="EnregistrerEqui">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    </body>

