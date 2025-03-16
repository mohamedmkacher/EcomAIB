<?php
session_start();


use produit\ServiceProd;

require_once "../../../model/produit/ServiceProd.php";

if (isset($_SESSION['role'])) {
    header("Location: ../../" . $_SESSION['role'] . "/produit/detail.php?ref=" . $_GET['ref']);
    exit();
} else {
    if (isset($_GET['ref'])) {
        include_once "../categorie/recuperer.php";
        $serviceProd = new ServiceProd();
        $produit = $serviceProd->getProduitById(+$_GET['ref']);
        $catProd = $serviceCat->getCategoryById($produit['categorieProd'])['libelleCat'];
        $surCat = $serviceCat->getSurCat($serviceCat->getCategoryById($produit['categorieProd'])['idCat']);
        include_once "../../../view/public/produit/detail.php";
    }

}