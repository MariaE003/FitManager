 <nav class="w-full bg-white shadow-sm px-10 py-4 flex justify-between items-center sticky top-0 z-10 border-b">
        <h1 class="text-2xl font-bold text-primary">Sport Manager</h1>
        <ul class="flex gap-8 text-lg font-medium">
            <li>
                <button onclick="showSection('dashboard')"
                    class="nav-btn text-black px-3 py-1 rounded-lg bg-primary  active">
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
