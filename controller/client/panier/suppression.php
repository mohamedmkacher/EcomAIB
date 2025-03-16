<?php

use lignePanier\LignePanier;
use lignePanier\ServiceLignePanier;
use panier\ServicePan;

require_once "../../../model/lignePanier/LignePanier.php";
require_once "../../../model/lignePanier/ServiceLignePanier.php";
require_once "../../../model/panier/ServicePan.php";



session_start();
if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {
    $servicePan = new ServicePan();
    $panier = $servicePan->getPanierEnCoursByClt($_SESSION["loggedId"]);
    $serviceLignePanier = new ServiceLignePanier();
    if (isset($_POST['suptout'])) {
        $serviceLignePanier->deleteLignePanier($_GET['prod'], $panier['codePanier']);
    } else {
        if (isset($_POST['sup'])) {
            $lignePanier = new LignePanier($_GET['prod'], -1, $panier['codePanier']);
            $serviceLignePanier->editLignePanier($lignePanier);
        }
    }

    header("Location: detail.php");
    exit();

} else {
    if ($_SESSION['role'] == 'ADMIN') {
        header("Location: ../../admin/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}