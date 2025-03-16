<?php

use categorie\ServiceCat;
use produit\ServiceProd;

require_once "../../../model/produit/ServiceProd.php";
require_once "../../../model/categorie/ServiceCat.php";

session_start();
if (isset($_SESSION['loggedId']) && $_SESSION['role'] == 'ADMIN') {
    $serviceProduit = new ServiceProd();
    $serviceCat = new ServiceCat();
    $cat = '';

    if (isset($_GET['idCat'])) {
        $cat = ' / ' . ucfirst($serviceCat->getCategoryById($_GET['idCat'])['libelleCat']);
        $produits = $serviceProduit->getProduitByCat($_GET['idCat']);
    } else {
        $produits = $serviceProduit->getProduits();
    }

    $sousCats = $serviceCat->getSousCategories();

    include_once "../../../view/admin/produit/liste.php";
} else {
    if ($_SESSION['role'] == 'CLIENT') {
        header("Location: ../../client/accueil/accueil.php");
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
    }
    exit();
}

