<?php
// require "../session.php";
require "../nav.php";
require "../connect.php";
$chapmsVide=false;

session_start();


if (isset($_POST['login'])) {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    $sql="SELECT * FROM users WHERE email='$email' AND passwordUser='$password'";
    // echo $connet->query($sql);
    $result=$connet->query($sql);
    if ($result->num_rows > 0){
        $_SESSION["id_user"]=$email;
        header("Location: ../index.php");
        exit();
    }
    }else{
  $chapmsVide=true;
}
    
}


?>

    <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
    <!-- <link href="../src/output.css" rel="stylesheet"> -->

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
                <h2 class="text-2xl font-bold text-gray-800">Login</h2>
            </div>
            <form method="POST">
                <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Email</label>
                         <input type="text" placeholder="Ex: Tapis@gmail.com"  name ="email"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">password</label>
                        <input type="text" placeholder="EX : hT POt"  name="password"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div id="toast-error"></div>

                </div>
                <div class="mt-6 text-right">
                    <a href="./inscrire.php"
                        class="mr-3 px-5 py-2 bg-red-100 text-red-700 rounded-md transition-all hover:bg-red-700 hover:text-white">
                       inscrire
                    </a>
                    <button 
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary" name="login">
                        login
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
        div.innerHTML="tout les champ sont obligatoire";
        div.className='show';
        setTimeout(function(){
            div.className=div.className.replace('show','');
        },3000);
    }    
    toast();
</script>
<?php
    }else{
        ?>
            <script>
    function toast(){
        let div=document.querySelector('#toast-error');
        div.innerHTML="email ou mot de pass invalide";
        div.className='show';
        setTimeout(function(){
            div.className=div.className.replace('show','');
        },3000);
    }    
    toast();
</script>
        <?php
    }
?>
    </body>

