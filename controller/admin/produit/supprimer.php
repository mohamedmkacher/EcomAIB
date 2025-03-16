<?php

use produit\ServiceProd;

require_once "../../../model/produit/ServiceProd.php";
require_once "../../../model/categorie/ServiceCat.php";

session_start();
if (isset($_SESSION['loggedId']) && $_SESSION['role'] == 'ADMIN') {
    $serviceProduit = new ServiceProd();
    $serviceProduit->deleteProduit($_GET['id']);
    header("Location: liste.php");
} else {
    if ($_SESSION['role'] == 'CLIENT') {
        header("Location: ../../client/accueil/accueil.php");
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
    }
}
exit();

