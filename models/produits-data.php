<?php



require 'models/Database.php';

require 'models/EtudiantModel.php';

$etudiantModel = new EtudiantModel();
$etudiants = $etudiantModel->all();

$config = require 'config.php';
$db = new Database($config['database']);;

$produits = $db->query("SELECT * FROM produits", []);
