<?php


use lignePanier\ServiceLignePanier;
use panier\EtatPanier;
use panier\Panier;
use panier\ServicePan;


require_once "../../../model/panier/ServicePan.php";
require_once "../../../model/panier/Panier.php";
require_once "../../../model/panier/EtatPanier.php";
require_once "../../../model/lignePanier/ServiceLignePanier.php";

session_start();
include_once "../../public/categorie/recuperer.php";


if (isset($_GET['etat'])&& $_SESSION['role'] == 'CLIENT') {
    $etat = $_GET['etat'];
    switch ($etat) {
        case 0:
            echo "<script>alert('Limite de 10 articles dépassée')</script>";
    }
}

if (isset($_SESSION["loggedId"])) {
    $servicePan = new ServicePan();
    $serviceLignePanier = new ServiceLignePanier();
    $panier = $servicePan->getPanierEnCoursByClt($_SESSION["loggedId"]);
    if (empty($panier)) {
        $panier = new Panier(0, $_SESSION["loggedId"], EtatPanier::EN_COURS);
        $servicePan->addPanier($panier);
        $liste = [];
        $tot=0;
    } else {
        $liste = $serviceLignePanier->getLignesPanier($panier['codePanier']);
        $tot=$serviceLignePanier->calculTot($panier['codePanier']);
    }
    include_once "../../../view/client/panier/detail.php";

} else {
    if ($_SESSION['role'] == 'ADMIN') {
        header("Location: ../../admin/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}