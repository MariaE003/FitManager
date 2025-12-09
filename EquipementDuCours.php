<?php
require './connect.php';
require './nav.php';
$idCours=$_GET["idCours"];
$sql="SELECT e.* FROM cours c INNER JOIN cours_equipements ce on c.id=ce.idC
INNER JOIN equipements e ON e.id=ce.idE WHERE c.id='$idCours'";

$test=$connet->query($sql);
$view=$test->fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="./src/output.css" rel="stylesheet"> -->

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
    <!-- <h1><?php echo $equi["typeEqui"] ?></h1> -->
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
                            foreach ($view as $equi) {
                            ?>
                            <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-4 text-gray-600"><?= $equi["nom"] ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?= $equi["typeEqui"] ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?= $equi["quantiteDispo"] ?></td>
                                        <td class="px-4 py-4">
                                            <span
                                                class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium"><?= $equi["etat"]?></span>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="flex gap-2">
                                                <!-- <a href="./deleteEquiFromCours.php?idEqui=<?= $equi['id']?>"
                                                    class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 transition suuprimerEqui">Supprimer</a> -->
                                            </div>
                                        </td>
                                    </tr>
                            <?php  
}
?>
                                
                        </tbody>
                    </table>
</body>
</html>

