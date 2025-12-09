<?php
require "./session.php";
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

<body class="bg-gray-100 text-gray-800 min-h-screen">

    <main class="p-10">
        <div id="dashboard-section" class="content-section">
            <h2 class="text-3xl font-bold mb-8 text-primary">Dashboard</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div
                    class="bg-white p-8 rounded-xl shadow text-center border transition-transform hover:-translate-y-2">
                    <h3 class="text-xl font-semibold">Total Cours</h3>
                    <?php
                    $count="SELECT COUNT(*) AS total FROM cours";
                    $test= $connet->query($count);
                    $resul=$test->fetch_assoc();
                    ?>

                    <p class="text-4xl font-bold mt-4 text-primary">
                        <?php echo $resul['total'];?> </p>
                    <div class="text-gray-400 text-sm mt-2">cours programmés</div>
                </div>
                 <?php
                    $count="SELECT COUNT(*) AS total FROM equipements";
                    $test= $connet->query($count);
                    $resul=$test->fetch_assoc();


                    // Nbr participant 
                    $parti="SELECT SUM(nombreMaxParticipants) as nbr_Participant FROM COURS";
                    $nbrPartici= $connet->query($parti);
                    $resulNbrPart=$nbrPartici->fetch_assoc();

                    ?>                    
                <div
                    class="bg-white p-8 rounded-xl shadow text-center border transition-transform hover:-translate-y-2">
                    <h3 class="text-xl font-semibold">Total Équipements</h3>
                    <p class="text-4xl font-bold mt-4 text-primary"> <?php echo $resul['total'];?></p>
                    <div class="text-gray-400 text-sm mt-2">équipements disponibles</div>
                </div>

                <div
                    class="bg-white p-8 rounded-xl shadow text-center border transition-transform hover:-translate-y-2">
                    <h3 class="text-xl font-semibold">Participants</h3>
                    <p class="text-4xl font-bold mt-4 text-primary"><?php echo $resulNbrPart['nbr_Participant'];?></p>
                <div class="text-gray-400 text-sm mt-2">nombre des Participants</div>
                </div>

                </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-5 rounded-xl shadow border text-center">
                    <h3 class="text-primary font-semibold mb-4 text-lg">Répartition des Cours</h3>
                    <!-- <p class="text-gray-600">📊 Yoga: 35% | Cardio: 30% | Musculation: 35%</p> -->
                        <canvas id="myChart"></canvas>
                </div>
                <div class="bg-white p-5 rounded-xl shadow border text-center">
                    <h3 class="text-primary font-semibold mb-4 text-lg">État des Équipements</h3>
                    <!-- <p class="text-gray-600">📊 Bon: 70% | Moyen: 20% | À remplacer: 10%</p> -->
                        <canvas id="myChartEquipement"></canvas>
                </div>
            </div>

        </div> 

        
    </main>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/script.js"></script>
    <script src="js/fetchDataJson.js"></script>
    

   <script>
        // window.onclick = function (event) {
        //     if (event.target.classList.contains('fixed')) {
        //         event.target.classList.add('hidden');
        //         event.target.classList.remove('flex');
        //     }
        // }
    </script>
</body>

</html>

