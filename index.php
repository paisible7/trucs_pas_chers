<?php
session_start();
$header = 'Bienvenue sur TrucsPasChers';
$title = 'Accueil';
$page = 'index.php' ?>
<?php require 'composants/head.php' ?>
<?php require 'composants/nav.php' ?>
<?php require 'composants/main.php' ?>
<?php require 'models/produits-data.php' ?>
<?php require 'models/articles-data.php'; ?>

    <!-- Section Hero -->
    <section class="py-12 px-4 mx-auto max-w-screen-xl lg:py-16">
        <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Bienvenue sur TrucsPasChers
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    <span class="font-bold">Trouvez les meilleures affaires en un clic</span><br>
                    Des produits de qualité à petit prix toute l'année<br>
                    TrucsPasChers, votre destination pour dépenser moins et vivre mieux
                </p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <a href="produits.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Voir tous nos produits
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="contact.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Nous contacter
                    </a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup" class="w-full">
            </div>
        </div>
    </section>

    <!-- Section Produits en Vedette -->
    <section class="py-12 px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Nos produits en vedette</h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php 
            // Afficher les 3 premiers produits
            $count = 0;
            foreach ($produits as $produit): 
                if ($count >= 3) break;
            ?>
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <img class="w-full h-48 object-cover rounded-t-lg" src="<?php echo 'upload/' . $produit['image'] ?>" alt="<?php echo $produit['nom'] ?>">
                    <div class="p-5">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?php echo $produit['nom'] ?>
                        </h3>
                        <p class="mt-3 mb-4 font-normal text-gray-700 dark:text-gray-400">
                            <?php echo $produit['prix'] . ' ' . $produit['devise'] ?>
                        </p>
                        <a href="produits.php" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Voir plus
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php 
                $count++;
            endforeach; 
            ?>
        </div>
    </section>

<?php require 'composants/footer.php' ?>