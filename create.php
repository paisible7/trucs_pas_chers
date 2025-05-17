<?php

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
require 'models/produits-data.php';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? null;
    $prix = $_POST['prix'] ?? null;
    $devise = $_POST['devise'] ?? null;
    $etudiant_id = $_POST['etudiant_id'] ?? null;

    // Vérifiez si un fichier a été téléchargé
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        // Déplacer l'image dans le dossier uploads
        move_uploaded_file($image_tmp_name, 'upload/' . $image_name);
        
        // Créer le produit dans la base de données
        try {
            $produitModel->create($nom, $prix, $devise, $etudiant_id, $image_name);
            $success = true;
        } catch (Exception $e) {
            $error = "Erreur lors de l'ajout du produit : " . $e->getMessage();
        }
    } else {
        $error = "Veuillez sélectionner une image";
    }
}

$page = "Create.php";
$title = 'Nouveau produit';
$header = 'Ajouter un nouveau produit';
?>

<?php require 'composants/head.php'; ?>
<?php require 'composants/nav.php'; ?>
<?php require 'composants/header.php'; ?>
<?php require 'composants/main.php'; ?>

<div class="h-screen">
    <form class="max-w-sm mx-auto" action="create.php" method="POST" enctype="multipart/form-data">
        <?php if ($success): ?>
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800">
                Le produit <span class="font-medium">
                    <?php echo $nom ?>
                </span> a été ajouté avec succès
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800">
                <?php echo $error ?>
            </div>
        <?php endif; ?>
        <div class="mb-5">
            <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du produit</label>
            <input type="text" id="nom" name="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nom du produit" required />
        </div>
        <div class="mb-5">
            <label for="prix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Entrez le prix</label>
            <input type="number" id="prix" name="prix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="8300" required />
        </div>
        <div class="mb-5">
            <label for="devise" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Devise</label>
            <select id="devise" name="devise" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <option>FC</option>
                <option>$</option>
            </select>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image du produit</label>
            <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="image" type="file">
        </div>
        <div class="mb-5">
            <label for="id_et" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Produit appartenent a l'étudiant</label>
            <select id="id_et" name="etudiant_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php foreach ($etudiants as $etudiant) : ?>
                    <option value="<?php echo $etudiant['id'] ?>">
                        <?php echo $etudiant['nom'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Ajouter </button>
    </form>

</div>
<?php require 'composants/footer.php'; ?>