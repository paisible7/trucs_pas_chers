<?php
$header = 'Bienvenue sur TrucPascher';
$title = 'Accueil';
$page = 'index.php' ?>
<?php require 'composants/head.php' ?>
<?php require 'composants/nav.php' ?>
<?php require 'composants/main.php' ?>
<?php require 'models/produits-data.php' ?>
<?php require 'models/articles-data.php'; ?>

<section class="bg-white dark:bg-gray-900  h-screen flex justify-center items-center">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                Bienvenu su notre site TrucsPasCher</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400"><span
                    class="font-bold">Trouvez les meilleures affaires en un clic</span><br>
                Des produits de qualité à petit prix toute l'année<br>
                Truc Pas Cher, votre destination pour dépenser moins et vivre mieux</p>
            <a href="produits.php"
                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Voir tous nos produits
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="contact.php"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Nous contacter
            </a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
        </div>
    </div>
</section>
<div class="px-24 py-4">
    <p>
        <?php
        echo 'On a ' . $article . ' montres à';
        ?>
        <strong>
            <?php
            echo $prix . ' ' . $devise
                ?>
        </strong>
        pour dame
    </p>
    
    <hr class="my-4">
    <div>
        <h3 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl py-3">Les noms de
            tous les articles</h3>
        <ul class="max-w-md space-y-1 text-gray-700 list-disc list-inside">
            <?php foreach ($articles_names as $name): ?>
                <li><?php echo $name; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div>
        <h3 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl py-3">Les noms et
            les prix de tous les articles</h3>
            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
            <?php foreach ($articles_prices as $name => $prix): ?>
                    <li class="pb-3 sm:pb-4 mb-4">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="shrink-0">
                                <img class="w-14 h-14 rounded-lg"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTse1splnNMWIPKoRKm7EmRYHbCDTIcChtgMw&s"
                                    alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    <?php echo $name; ?>
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    <i>site truc pas cher</i>
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                <?php echo $prix . ' Fc'; ?>
                            </div>
                        </div>
                    </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>
        <h3 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl py-3">Les noms et
            les prix de tous les articles de <span
                class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">moins de
                10000 Fc</span></h3>
        <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
            <?php foreach ($articles_prices as $name => $prix): ?>
                <?php if ($prix < 10000): ?>
                    <li class="pb-3 sm:pb-4 mb-4">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="shrink-0">
                                <img class="w-14 h-14 rounded-lg"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYGKsbDG1wV7VHvAMmC9dKrXJMIQr2TleSrQ&s"
                                    alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    <?php echo $name; ?>
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    <i>site truc pas cher</i>
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                <?php echo $prix . ' Fc'; ?>
                            </div>
                        </div>
                    </li>
                <?php endif ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div>
        <h3 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl py-3">
            <?php echo 'Le total de tous les articles est : <mark class="px-2 text-white bg-blue-600 rounded-sm dark:bg-blue-500">' . $total . ' Fc </mark>' ?>
        </h3>
    </div>
    <div>
        <h3 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl py-3">L'identite
            d'un client</h3>

        <div class="pb-3 sm:pb-4">
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                <div class="shrink-0">
                    <img class="w-16 h-16 rounded-full" src="https://koreus.cdn.li/media/201401/74-insolite-22.jpg"
                        alt="Neil image">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-lg font-medium text-gray-900 truncate" ?>
                        <?php echo 'Nom : ' . $etudiants[0]['nom']; ?>
                    </p>
                    <p class="text-sm text-gray-700 truncate">
                        <?php echo 'Promition : ' . $etudiants[0]['promotion']; ?>
                    <p class="text-sm text-gray-700 truncate">
                        <?php echo 'Téléphone : ' . $etudiants[0]['tel']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php require 'composants/footer.php' ?>