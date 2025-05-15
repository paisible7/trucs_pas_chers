<?php

class ProduitModel
{
    public function all()
    {
        $config = require 'config.php';
        $db = new Database($config['database']);;

        return $db->query("SELECT * FROM produits")->fetchAll();
    }

    public function filterByEtudiantId($etudiant_id)
    {

        $config = require 'config.php';
        $db = new Database($config['database']);
        $produits = $db->query("SELECT * FROM produits WHERE etudiant_id = :etudiant_id ", ["etudiant_id" => $etudiant_id])->fetchAll();

        return $produits;
    }
}
