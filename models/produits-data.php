<?php



require 'models/Database.php';

require 'models/EtudiantModel.php';
require 'models/ProduitModel.php';

$etudiantModel = new EtudiantModel();
$etudiants = $etudiantModel->all();
$produitModel = new ProduitModel;
$produits = $produitModel->all();

$config = require 'config.php';
$db = new Database($config['database']);;

$produits = $db->query("SELECT * FROM produits")->fetchAll();
