<?php
require "../session.php";
require "../nav.php";
require "../connect.php";
$chapmsVide=false;
$name=false;
$$name=false;
$Quantite=false;
// modifier un equipement
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
    <link rel="stylesheet" href="../style/style.css">

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
$chapmsVide=false;
$name=false;
$$name=false;
$Quantite=false;
if (isset($_POST['modifier'])) {
//    $id= $_POST["idCours"];
    
    // $nom=$_POST["nom"];
    // $type=$_POST["type"];
    // $quantite=$_POST["quantite"];
    // $etat=$_POST["etat"];


    
if (!empty($_POST["nom"]) && !empty($_POST["type"]) && !empty($_POST["quantite"]) && !empty($_POST["etat"])){
        $nom=$_POST["nom"];
        $typeE=$_POST["type"];
        $quantite=$_POST["quantite"];
        $etat=$_POST["etat"];
       
        // echo $nom;
    //   echo "les champ sont obligatoire";
    //   echo "nadddddiiiia";
    if (strlen($nom)<5 ){
            $name=true;
    }elseif ($quantite<1) {
       $Quantite=true;
    }
    else{
 $update="UPDATE equipements SET nom='$nom',typeEqui='$type',quantiteDispo='$quantite',etat='$etat' WHERE id=$id";
//  $exec=$connet->query($update);
 if ($connet->query($update)) {
    header("Location:../equipements.php");
    exit();
 }
}}
else{
       $chapmsVide=true;
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
                            <option value="Poids libres"<?= ($equi['typeEqui']=='Poids libres')?'selected':'' ?>>Poids libres</option>
                            <option value="Haltères"<?= ($equi['typeEqui']=='Haltères')?'selected':'' ?>>Haltères</option>
                            <option value="Barres olympiques"<?= ($equi['typeEqui']=='Barres olympiques')?'selected':'' ?>>Barres olympiques</option>
                            <option value="Racks"<?= ($equi['typeEqui']=='Racks')?'selected':'' ?>>Racks</option>
                            <option value="Smith Machine"<?= ($equi['typeEqui']=='Smith Machine')?'selected':'' ?>>Smith Machine</option>
                            <option value="Kettlebells"<?= ($equi['typeEqui']=='Kettlebells')?'selected':'' ?>>Kettlebells</option>
                            <option value="Banc de musculation"<?= ($equi['typeEqui']=='Banc de musculation')?'selected':'' ?>>Banc de musculation</option>
                            <option value="Câbles & Poulies"<?= ($equi['typeEqui']=='Câbles & Poulies')?'selected':'' ?>>Câbles & Poulies</option>
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
                            <option value="Bon" <?=$equi['etat']=='Bon'?'selected':''?>>Bon</option>
                            <option value="Moyen" <?=$equi['etat']=='Moyen'?'selected':''?>>Moyen</option>
                            <option value="À remplacer" <?=$equi['etat']=='À remplacer'?'selected':''?>>À remplacer</option>
                        </select>
                    </div>
                    <div id="toast-error"></div>

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
    <?php
    if ($chapmsVide) {
    ?>
<script>
    function toast(){
        let div=document.querySelector('#toast-error');
        div.innerHTML="tout les champs sont obligatoir";
        div.className='show';
        setTimeout(function(){
            div.className=div.className.replace('show','');
        },3000);
    }    
    toast();
</script>
<?php
    }
    if ($name) {
        ?>
        <script>
        function toastName(){
        let div=document.querySelector('#toast-error');
        div.innerHTML="le nom  doit contient plus des 5 caractere.";
        div.className='show';
        setTimeout(function(){
            div.className=div.className.replace('show','');
        },3000);
    }    
    toastName();
    </script>
    <?php
    }
    if ($Quantite) {
       ?>
       <script>
        function toastquantite(){
        let div=document.querySelector('#toast-error');
        div.innerHTML="la quantite doit contient un nombre superier a 0";
        div.className='show';
        setTimeout(function(){
            div.className=div.className.replace('show','');
        },3000);
    }    
    toastquantite();
       </script>
       <?php
    }
?>


    </body>

