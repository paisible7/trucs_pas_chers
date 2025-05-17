<?php

session_start();
$header = 'Tous les produits';
$title = 'Produits';
$page = 'produits.php'
?>
<?php require 'composants/head.php' ?>
<?php require 'composants/nav.php' ?>
<?php require 'composants/header.php' ?>
<?php require 'composants/main.php' ?>
<?php require 'models/produits-data.php' ?>
<div class="px-24 py-4">
    <div class="grid grid-cols-3 gap-4">

        <?php foreach ($produits as $produit): ?>
            <div
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="<?php echo 'upload/' . $produit['image'] ?>"
                    alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <?php echo 'Nom : ' . $produit['nom'] . '<br>' ?>
                    </h5>
                    <div class="font-normal text-gray-700 dark:text-gray-300">
                        <?php echo 'Prix : ' . $produit['prix'] . ' ' . $produit['devise'] . '<br>' ?>
                        <?php foreach ($etudiants as $etudiant): ?>
                            <?php if ($etudiant['id'] === $produit['etudiant_id']): ?>
                                Nom : <a href="filtre.php?etudiant_id=<?php echo $produit['etudiant_id'] ?>" class="text-blue-550 hover:text-blue-850 text-semibold"><?php echo $etudiant['nom'] . '<br>' ?></a>
                                Promotion : <?php echo $etudiant['promotion'] . '<br>' ?>
                                Contact : <?php echo $etudiant['tel'] . '<br>' ?>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</div>
<?php require 'composants/footer.php' ?>