<?php
require "../nav.php";
require "../connect.php";

if (isset($_POST['inscrire'])) {
    $nom=$_POST["nom"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $phone=$_POST["phone"];
    $dateNais=$_POST["dateNais"];
    $sql="INSERT INTO users(name,email,passwordUser,phone,dateNais) VALUES ('$nom','$email','$password','$phone','$dateNais')";
    if ($connet->query($sql)){
        header("Location:../index.php");
        exit();
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
                <h2 class="text-2xl font-bold text-gray-800">inscription</h2>
            </div>
            <form method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Nom</label>
                        <input type="text" placeholder="Ex: Tapis de Course" required name ="nom"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">Email</label>
                         <input type="email" placeholder="Ex: Tapis@gmail.com" required name ="email"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">password</label>
                        <input type="text" placeholder="EX : hT POt" required name="password"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">phone</label>
                        <input type="tel" placeholder="Ex: 0699225566" required name="phone"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 text-gray-600 font-medium text-sm">date de naissance</label>
                        <input type="date" placeholder="Ex: 2003/06/12" required name ="dateNais"
                            class="px-3 py-3 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                    </div>
                </div>
                <div class="mt-6 text-right">
                    <a href="./login.php"
                        class="mr-3 px-5 py-2 bg-red-100 text-red-700 rounded-md transition-all hover:bg-red-700 hover:text-white">
                       Login
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-primary text-white rounded-lg transition-all hover:bg-secondary" name="inscrire">
                        inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    </body>

