<nav class="w-full bg-white shadow-sm px-10 py-4 flex justify-between items-center sticky top-0 z-10 border-b">
        <h1 class="text-2xl font-bold text-primary">Sport Manager</h1>
        <ul class="flex gap-8 text-lg font-medium">
            <li>
                <!-- <button onclick="showSection('dashboard')"
                    class="nav-btn text-black px-3 py-1 rounded-lg bg-primary  active">
                    Dashboard
                </button> -->
                <a href="/"
                    class="nav-btn text-black px-3 py-1 rounded-lg bg-primary  active">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="cours.php"
                    class="nav-btn px-3 py-1 rounded-lg hover:bg-blue-100 transition">
                    Cours
                </a>
            </li>
            <li>
                <a href="equipements.php"
                    class="nav-btn px-3 py-1 rounded-lg hover:bg-blue-100 transition">
                    Équipements
                </a>
            </li>
            <li>
                <!-- onclick="showSection('parametres')"  -->
                 
                 <form action="" method="POST">       

                     <button type="submit" name="logout" 
                         class="nav-btn px-3 py-1 rounded-lg hover:bg-blue-100 transition cursor-pointer <?= isset($_SESSION["id_user"])?"block":"hidden"?>">
                         deconnecter
                     </button>

                 </form>
            </li>
        </ul>
    </nav>
