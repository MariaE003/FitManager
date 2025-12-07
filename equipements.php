
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

        <div id="equipements-section" class="content-section ">
            <div class="bg-white p-8 rounded-xl shadow border">
                <div class="flex justify-between items-center mb-6 pb-4 border-b-2 border-gray-100">
                    <h2 class="text-3xl font-bold text-primary">Gestion des Équipements</h2>
                    <div class="flex flex-col">
                       <!-- <label class="mb-2 text-gray-600 font-medium text-sm">Nom du Cours *</label> -->
                       <input type="text" placeholder="nom du Equipement" required name="nomEquiSearch"
                           class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                   </div>
                   <!-- onclick="openModal('equipementModal')" -->
                    <a href="./equipements/add.php" 
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary">
                        ➕ Ajouter un Équipement
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Nom</th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Type</th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Quantité
                                </th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">État</th>
                                <th class="px-4 py-4 text-left text-sm font-semibold text-primary uppercase">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $test = "SELECT * FROM equipements";
                           $abc = $connet->query($test);
                            $data = $abc->fetch_all(MYSQLI_ASSOC);
                            if (count($data) > 0) {
                                foreach ($data as $qui) {
                                    // echo $qui['typeEqui'] . "<br>";
                                    ?>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-4 text-gray-600"><?php echo $qui["nom"] ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?php echo $qui["typeEqui"] ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?php echo $qui["quantiteDispo"] ?></td>
                                        <td class="px-4 py-4">
                                            <span
                                                class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium"><?php echo $qui["etat"]?></span>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="flex gap-2">
                                                <a href="./equipements/edit.php?idEquiUpdate=<?php echo $qui['id']?>"
                                                    class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition modifierEqui">Modifier</a>
                                                <a href="./equipements/delete.php?idEqui=<?php echo $qui['id']?>"
                                                    class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 transition suuprimerEqui">Supprimer</a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php
                                }
                            } else {
                                echo 
                                "<tr>
                                    <td colspan='7' class='px-4 py-6 text-center text-gray-500'>aucun equipements trouve</td>
                                </tr>                      
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</body>