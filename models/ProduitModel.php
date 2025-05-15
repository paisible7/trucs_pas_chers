<?php

class ProduitModel
{

    protected $db;

    public function __construct()
    {
        $config = require 'config.php';
        $this->db = new Database($config['database']);
    }


    public function find($id)
    {
        $config = require 'config.php';
        $db = new Database($config['database']);
        $produit = $db->query("SELECT * FROM produits WHERE id = :id", ["id" => $id])->fetch();

        return $produit;
    }
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

    public function create($nom, $prix, $devise, $etudiant_id, $image_name)
    { {
            // Enregistrer les infos du produit dans la base de données
            $this->db->query("INSERT INTO produits (nom, prix, devise, etudiant_id, image) 
    VALUES (:nom, :prix, :devise, :etudiant_id, :image)", [
                'nom' => $nom,
                'prix' => $prix,
                'devise' => $devise,
                'etudiant_id' => $etudiant_id,
                'image' => $image_name
            ]);
        }
    }
}
