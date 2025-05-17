<?php

$same = "rounded-md px-3 py-2 text-sm font-medium";
$current = $same . " bg-gray-900 text-white";
$default = $same . " text-gray-300 hover:bg-gray-700 hover:text-white";

?>

<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="index.php" class="<?php echo ($page === 'index.php') ? $current : $default ?>" aria-current="page">
                            Accueil
                        </a>
                        <a href="filtre.php" class="<?php echo ($page === 'filtre.php') ? $current : $default ?>">
                            Filtre
                        </a>
                        <a href="produits.php" class="<?php echo ($page === 'produits.php') ? $current : $default ?>">
                            Produits
                        </a>
                        <a href="about.php" class="<?php echo ($page === 'about.php') ? $current : $default ?>">
                            About
                        </a>
                        <a href="contact.php" class="<?php echo ($page === 'contact.php') ? $current : $default ?>">
                            Contact
                        </a>
                    </div>
                </div>
            </div>

            <div class="block">
                <div class="ml-4 flex items-center md:ml-6">
                    <?php if (isset($_SESSION['user'])): ?>
                        <!-- Bouton Nouveau Produit (visible uniquement si connecté) -->
                        <a href="create.php" class="<?php echo ($page === 'create.php') ? $current : $default ?> mr-4">
                            Nouveau Produit
                        </a>

                        <!-- Notifications (visible uniquement si connecté) -->
                        <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Voir les notifications</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </button>

                        <!-- Menu Profil (visible uniquement si connecté) -->
                        <div class="relative ml-3">
                            <div>
                                <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Ouvrir le menu utilisateur</span>
                                    <img class="size-8 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user']['nom']); ?>&background=random" alt="<?php echo htmlspecialchars($_SESSION['user']['nom']); ?>">
                                </button>
                            </div>

                            <!-- Menu déroulant -->
                            <div class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <div class="px-4 py-2 text-sm text-gray-700 border-b">
                                    <?php echo htmlspecialchars($_SESSION['user']['nom']); ?>
                                </div>
                                <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Mon Profil</a>
                                <a href="settings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Paramètres</a>
                                <form action="logout.php" method="POST" class="block">
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100" role="menuitem">
                                        Se déconnecter
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Bouton de connexion (visible uniquement si non connecté) -->
                        <a href="login.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Se connecter
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
// Script pour gérer le menu déroulant du profil
document.getElementById('user-menu-button')?.addEventListener('click', function() {
    const menu = this.nextElementSibling;
    menu.classList.toggle('hidden');
});

// Fermer le menu si on clique en dehors
document.addEventListener('click', function(event) {
    const menu = document.querySelector('[role="menu"]');
    const button = document.getElementById('user-menu-button');
    if (menu && !menu.contains(event.target) && !button?.contains(event.target)) {
        menu.classList.add('hidden');
    }
});
</script>
