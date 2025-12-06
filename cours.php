<?php
require "session.php";
require "nav.php";
require "connect.php";




?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sport Manager - Gestion Salle de Sport</title>
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

<body class="bg-gray-100 text-gray-800 min-h-screen">
<div id="cours-section" class="content-section ">
            <div class="bg-white p-8 rounded-xl shadow border">
                <div class="flex justify-between items-center mb-6 pb-4 border-b-2 border-gray-100">
                    <h2 class="text-3xl font-bold text-primary">Gestion des Cours</h2>
                    <div class="flex flex-col">
                       <!-- <label class="mb-2 text-gray-600 font-medium text-sm">Nom du Cours *</label> -->
                       <input type="text" placeholder="nom du cours" required name="nomcoursSearch"
                           class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                   </div>
                   <!-- kan button et onclick="openModal('coursModal')" -->
                    <a href="/cours/add.php" 
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary">
                        ➕ Ajouter un Cours
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Nom</th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Catégorie
                                </th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Date</th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Heure</th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Durée</th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">
                                    Participants Max</th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $test = "SELECT * FROM cours";

                            $abc = $connet->query($test);
                            $data = $abc->fetch_all(MYSQLI_ASSOC);
                            // echo $data;
                            // foreach($data as $cours){
                            //     echo $cours['nom'] . "<br>";
                            // }
                            
                            // $abc = $connet->query($test);
                            // $data = $abc->fetchAll(PDO::FETCH_ASSOC);
                            if (count($data) > 0) {
                                foreach ($data as $cours) {
                                    // echo $cours['id'] . "<br>";
                                    $time = $cours["heure"];
                                    $heurMinute = date("H:i", strtotime($time));
                                    ?>

                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-4 text-gray-600"><?php echo $cours["nom"] ?></td>
                                        <td class="px-4 py-4">
                                            <span
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium"><?php echo $cours["catégorie"] ?></span>
                                        </td>
                                        <td class="px-4 py-4 text-gray-600"><?php echo $cours["dateCours"] ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?php echo $heurMinute ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?php echo $cours["duree"] ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?php echo $cours["nombreMaxParticipants"] ?></td>
                                        <td class="px-4 py-4">
                                            <div class="flex gap-2">
                                                <!-- <form method="GET"> 
                                                    onclick="openModal('updatecoursModal');event.preventDefault();"
                                                -->
                                                    <a href="./cours/edit.php?idEditCours=<?php echo $cours['id']?>"
                                                    name="modifierCours" class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition modifierCours">Modifier</a>
                                                    
                                                    <a href="./cours/delete.php?id=<?php echo $cours['id']?>" class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 transition supprimerCours">Supprimer</a>
                                                <!-- </form> -->
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } 
                            else {
                                echo "aucun cours trouve";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>