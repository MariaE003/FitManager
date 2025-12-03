<?php
require "connect.php";
//  echo "hi";
// $insert="INSERT INTO cours(nom, catégorie, dateCours, heure, duree, nombreMaxParticipants) values('abc','abcCat','2003-06-12','11',1,15)";
// $connet->exec($insert);
// echo "test"
?>


<?php
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
    if ($connet->query($sql) === true) {
        // echo "la insertion  reussite";
        header("Location:index.php");
        exit();
    }
    }
}


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
    $sql="INSERT INTO equipements(nom,type, quantiteDispo, etat) VALUES('$nom','$typeE','$quantite','$etat')";
    // echo $nom ,$categorieCours , $dateCours,$heureCours,$durreCours,$MaxParticipantCours;

    // $abd=$connet->query($sql);
    if ($connet->query($sql) === true) {
        // echo "la insertion  reussite";
        header("Location:index.php");
        exit();
    }
    }
}

// supprimer un cours
if(isset($_GET['id'])){
// echo "id clicabe : ".$_GET['id'];
$id=$_GET['id'];
$sqlDelete="DELETE FROM cours WHERE id=$id";
if ($connet->query($sqlDelete)) {
    // echo "supprision reusite de id du cours ".$_GET['id'];
}
}

// supprimer un equipement
if(isset($_GET['idEqui'])){
// echo "id clicabe : ".$_GET['idEqui'];
$idEqui=$_GET['idEqui'];
$sqlDeleteEqui="DELETE FROM equipements WHERE id=$idEqui";
if ($connet->query($sqlDeleteEqui)) {
    // echo "supprision reusite de id du cours ".$idEqui;
}
}

// modifier un cous

// if(isset($_GET['id'])){
// // echo "id clicabe : ".$_GET['id'];
// $id=$_GET['id'];
// $sqlDelete="SELECT * FROM cours WHERE id=$id";
// if ($connet->query($sqlDelete)) {
//     echo $sqlDelete;
//     // echo "supprision reusite de id du cours ".$_GET['id'];
// }
// }


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

    <!-- NAVBAR - Design du premier code -->
    <nav class="w-full bg-white shadow-sm px-10 py-4 flex justify-between items-center sticky top-0 z-10 border-b">
        <h1 class="text-2xl font-bold text-primary">Sport Manager</h1>
        <ul class="flex gap-8 text-lg font-medium">
            <li>
                <button onclick="showSection('dashboard')"
                    class="nav-btn px-3 py-1 rounded-lg bg-primary text-white active">
                    Dashboard
                </button>
            </li>
            <li>
                <button onclick="showSection('cours')"
                    class="nav-btn px-3 py-1 rounded-lg hover:bg-blue-100 transition">
                    Cours
                </button>
            </li>
            <li>
                <button onclick="showSection('equipements')"
                    class="nav-btn px-3 py-1 rounded-lg hover:bg-blue-100 transition">
                    Équipements
                </button>
            </li>
            <li>
                <button onclick="showSection('parametres')"
                    class="nav-btn px-3 py-1 rounded-lg hover:bg-blue-100 transition">
                    Paramètres
                </button>
            </li>
        </ul>
    </nav>

    <main class="p-10">
        <!-- Dashboard Section -->
        <div id="dashboard-section" class="content-section">
            <h2 class="text-3xl font-bold mb-8 text-primary">Dashboard</h2>

            <!-- CARDS - Fusion des deux designs -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div
                    class="bg-white p-8 rounded-xl shadow text-center border transition-transform hover:-translate-y-2">
                    <h3 class="text-xl font-semibold">Total Cours</h3>
                    <p class="text-4xl font-bold mt-4 text-primary">24</p>
                    <div class="text-gray-400 text-sm mt-2">cours programmés</div>
                </div>

                <div
                    class="bg-white p-8 rounded-xl shadow text-center border transition-transform hover:-translate-y-2">
                    <h3 class="text-xl font-semibold">Total Équipements</h3>
                    <p class="text-4xl font-bold mt-4 text-primary">156</p>
                    <div class="text-gray-400 text-sm mt-2">équipements disponibles</div>
                </div>

                <div
                    class="bg-white p-8 rounded-xl shadow text-center border transition-transform hover:-translate-y-2">
                    <h3 class="text-xl font-semibold">Participants</h3>
                    <p class="text-4xl font-bold mt-4 text-primary">342</p>
                    <div class="text-gray-400 text-sm mt-2">inscriptions actives</div>
                </div>

                <div
                    class="bg-white p-8 rounded-xl shadow text-center border transition-transform hover:-translate-y-2">
                    <h3 class="text-xl font-semibold">Taux d'occupation</h3>
                    <p class="text-4xl font-bold mt-4 text-primary">78%</p>
                    <div class="text-gray-400 text-sm mt-2">capacité utilisée</div>
                </div>
            </div>

            <!-- Stats supplémentaires du deuxième code -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-5 rounded-xl shadow border text-center">
                    <h3 class="text-primary font-semibold mb-4 text-lg">Répartition des Cours</h3>
                    <p class="text-gray-600">📊 Yoga: 35% | Cardio: 30% | Musculation: 35%</p>
                </div>
                <div class="bg-white p-5 rounded-xl shadow border text-center">
                    <h3 class="text-primary font-semibold mb-4 text-lg">État des Équipements</h3>
                    <p class="text-gray-600">📊 Bon: 70% | Moyen: 20% | À remplacer: 10%</p>
                </div>
            </div>

            <!-- TABLE - Design du premier code avec fonctionnalités du deuxième -->
            <div class="bg-white mt-12 p-8 rounded-xl shadow border">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold">Liste des Cours Récents</h3>
                </div>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="py-3 px-4 text-primary font-semibold">Nom</th>
                            <th class="py-3 px-4 text-primary font-semibold">Catégorie</th>
                            <th class="py-3 px-4 text-primary font-semibold">Date</th>
                            <th class="py-3 px-4 text-primary font-semibold">Heure</th>
                            <th class="py-3 px-4 text-primary font-semibold">Durée</th>
                            <th class="py-3 px-4 text-primary font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-4 text-gray-600">Yoga Matinal</td>
                            <td class="px-4">
                                <span
                                    class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Yoga</span>
                            </td>
                            <td class="px-4 text-gray-600">2025-01-10</td>
                            <td class="px-4 text-gray-600">08:00</td>
                            <td class="px-4 text-gray-600">60 min</td>
                            <td class="px-4 space-x-3">
                                <button
                                    class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition">Modifier</button>
                                <button
                                    class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 transition">Supprimer</button>
                            </td>
                        </tr>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-4 text-gray-600">Musculation</td>
                            <td class="px-4">
                                <span
                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Musculation</span>
                            </td>
                            <td class="px-4 text-gray-600">2025-01-12</td>
                            <td class="px-4 text-gray-600">18:00</td>
                            <td class="px-4 text-gray-600">90 min</td>
                            <td class="px-4 space-x-3">
                                <button
                                    class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition">Modifier</button>
                                <button
                                    class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 transition">Supprimer</button>
                            </td>
                        </tr>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-4 text-gray-600">Cardio Intensif</td>
                            <td class="px-4">
                                <span
                                    class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Cardio</span>
                            </td>
                            <td class="px-4 text-gray-600">2025-01-15</td>
                            <td class="px-4 text-gray-600">10:00</td>
                            <td class="px-4 text-gray-600">45 min</td>
                            <td class="px-4 space-x-3">
                                <button
                                    class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition">Modifier</button>
                                <button
                                    class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 transition">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Cours Section -->
        <div id="cours-section" class="content-section hidden">
            <div class="bg-white p-8 rounded-xl shadow border">
                <div class="flex justify-between items-center mb-6 pb-4 border-b-2 border-gray-100">
                    <h2 class="text-3xl font-bold text-primary">Gestion des Cours</h2>
                    <div class="flex flex-col">
                       <!-- <label class="mb-2 text-gray-600 font-medium text-sm">Nom du Cours *</label> -->
                       <input type="text" placeholder="nom du cours" required name="nomcoursSearch"
                           class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                   </div>
                    <button onclick="openModal('coursModal')"
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary">
                        ➕ Ajouter un Cours
                    </button>
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
                            if ($data > 0) {
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
                                                <form action="" method="GET">
                                                    <a href="index.php?id=<?php echo $cours['id']?>"
                                                        class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition modifierCours">Modifier</a>
                                                    <a href="index.php?id=<?php echo $cours['id']?>"
                                                        class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 transition supprimerCours">Supprimer</a>
                                                </form>
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

        <!-- Équipements Section -->
        <div id="equipements-section" class="content-section hidden">
            <div class="bg-white p-8 rounded-xl shadow border">
                <div class="flex justify-between items-center mb-6 pb-4 border-b-2 border-gray-100">
                    <h2 class="text-3xl font-bold text-primary">Gestion des Équipements</h2>
                    <div class="flex flex-col">
                       <!-- <label class="mb-2 text-gray-600 font-medium text-sm">Nom du Cours *</label> -->
                       <input type="text" placeholder="nom du Equipement" required name="nomEquiSearch"
                           class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                   </div>
                    <button onclick="openModal('equipementModal')"
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary">
                        ➕ Ajouter un Équipement
                    </button>
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
                            if ($data > 0) {
                                foreach ($data as $qui) {
                                    // echo $cours['nom'] . "<br>";
                                    ?>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-4 text-gray-600"><?php echo $qui["nom"] ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?php echo $qui["type"] ?></td>
                                        <td class="px-4 py-4 text-gray-600"><?php echo $qui["quantiteDispo"] ?></td>
                                        <td class="px-4 py-4">
                                            <span
                                                class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium"><?php echo $qui["etat"]?></span>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="flex gap-2">
                                                <a href="index.php?idEqui=<?php echo $qui['id']?>"
                                                    class="px-4 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition modifierEqui">Modifier</a>
                                                <a href="index.php?idEqui=<?php echo $qui['id']?>"
                                                    class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 transition suuprimerEqui">Supprimer</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            } else {
                                echo "aucun cours trouve";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Section Paramètres (basique) -->
        <div id="parametres-section" class="content-section hidden">
            <div class="bg-white p-8 rounded-xl shadow border">
                <h2 class="text-3xl font-bold mb-8 text-primary">Paramètres</h2>
                <div class="space-y-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-lg mb-2">Notifications</h3>
                        <p class="text-gray-600 mb-2">Gérer les préférences de notifications</p>
                        <button
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition">Configurer</button>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-lg mb-2">Compte</h3>
                        <p class="text-gray-600 mb-2">Modifier les informations du compte</p>
                        <button
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Cours -->
    <div id="coursModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white p-8 rounded-xl max-w-2xl w-11/12 max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Ajouter un Cours</h2>
                <button onclick="closeModal('coursModal')"
                    class="text-3xl text-gray-400 hover:text-gray-800 border-0 bg-transparent">×</button>
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
                    <button type="button" onclick="closeModal('coursModal')"
                        class="mr-3 px-5 py-2 bg-red-100 text-red-700 rounded-md transition-all hover:bg-red-700 hover:text-white">
                        Annuler
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary" name="EnregistrerCours">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Équipement -->
    <div id="equipementModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white p-8 rounded-xl max-w-2xl w-11/12 max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Ajouter un Équipement</h2>
                <button onclick="closeModal('equipementModal')"
                    class="text-3xl text-gray-400 hover:text-gray-800 border-0 bg-transparent">×</button>
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
                    <button type="button" onclick="closeModal('equipementModal')"
                        class="mr-3 px-5 py-2 bg-red-100 text-red-700 rounded-md transition-all hover:bg-red-700 hover:text-white">
                        Annuler
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary" name="EnregistrerEqui">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showSection(section) {
            document.querySelectorAll('.content-section').forEach(s => s.classList.add('hidden'));
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-secondary');
                btn.classList.remove('bg-primary');
            });

            const btn = event.target;
            btn.classList.add('active');
            btn.classList.add('bg-primary');

            document.getElementById(section + '-section').classList.remove('hidden');
        }

        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.getElementById(modalId).classList.add('flex');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.getElementById(modalId).classList.remove('flex');
        }

        window.onclick = function (event) {
            if (event.target.classList.contains('fixed')) {
                event.target.classList.add('hidden');
                event.target.classList.remove('flex');
            }
        }
    </script>
</body>

</html>

