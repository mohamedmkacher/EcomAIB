<?php
session_start();

use produit\ServiceProd;

require_once "../../../model/produit/ServiceProd.php";

if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {
    if (isset($_GET['ref'])) {
        include_once "../../public/categorie/recuperer.php";

        $serviceProd = new ServiceProd();

        $produit = $serviceProd->getProduitById(+$_GET['ref']);
        $catProd = $serviceCat->getCategoryById($produit['categorieProd'])['libelleCat'];
        $surCat = $serviceCat->getSurCat($serviceCat->getCategoryById($produit['categorieProd'])['idCat']);


        include_once "../../../view/client/produit/detail.php";
    }
} else {
    if ($_SESSION['role'] == 'ADMIN') {
        header("Location: ../../admin/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}