<?php
session_start();

use produit\ServiceProd;


require_once "../../../model/produit/ServiceProd.php";


if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {

    include_once "../../public/categorie/recuperer.php";

    $serviceProd = new ServiceProd();
    $categorie = '';
    if (isset($_GET['filter'])) {
        $sousCategories = $serviceCat->getCategoriesBySurCategorie($_GET['cat']);
        $sousCat = $serviceCat->getCategoryById($_GET['sousCat']);
        $produits = $serviceProd->getProduitByCat($_GET['sousCat']);
        $categorie = ucfirst($serviceCat->getCategoryById($_GET['cat'])['libelleCat']) . ' / ' . ucfirst($sousCat['libelleCat']);
    } else {
        if (isset($_GET['cat'])) {
            unset($_SESSION['motsCles']);
            $sousCategories = $serviceCat->getCategoriesBySurCategorie($_GET['cat']);
            $produits = $serviceProd->getProdBySurCat($_GET['cat']);
            $categorie = ucfirst($serviceCat->getCategoryById($_GET['cat'])['libelleCat']);
        }
    }
    if (isset($_POST['recherche'])) {
        $motsCles = explode(' ', trim($_POST['recherche']));
        $_SESSION['motsCles'] = $motsCles;
        $produits = $serviceProd->rechercheProd($motsCles);


    }
    if (isset($_SESSION['motsCles'])) {
        $produits = $serviceProd->rechercheProd($_SESSION['motsCles']);
    }


    $produitsFiltres = $produits;


    $produitsParPage = 3;


    $totalProduits = count($produitsFiltres);
    $totalPages = ceil($totalProduits / $produitsParPage);

    if (isset($_GET['page'])) {
        $pageActuelle = $_GET['page'];
    } else {
        $pageActuelle = 1;
    }
    if ($pageActuelle < 1) {
        $pageActuelle = 1;
    } elseif ($pageActuelle > $totalPages) {
        $pageActuelle = $totalPages;
    }


    $debut = ($pageActuelle - 1) * $produitsParPage;


    $produitsAfficher = array_slice($produitsFiltres, $debut, $produitsParPage);


    include_once "../../../view/client/produit/liste.php";
} else {
    if ($_SESSION['role'] == 'ADMIN') {
        header("Location: ../../admin/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}