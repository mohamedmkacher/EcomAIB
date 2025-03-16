<?php

use exceptions\LimitePanier;
use lignePanier\LignePanier;
use lignePanier\ServiceLignePanier;
use panier\EtatPanier;
use panier\Panier;
use panier\ServicePan;

require_once "../../../model/panier/ServicePan.php";
require_once "../../../model/lignePanier/ServiceLignePanier.php";
require_once "../../../model/panier/EtatPanier.php";
require_once "../../../model/panier/Panier.php";
require_once "../../../model/lignePanier/LignePanier.php";
require_once "../../../model/exceptions/LimitePanier.php";


session_start();

if (isset($_SESSION["loggedId"])) {
    if ($_SESSION['role'] == 'CLIENT') {
        $servicePan = new ServicePan();
        $panier = $servicePan->getPanierEnCoursByClt($_SESSION["loggedId"]);
        if (empty($panier)) {
            $panier = new Panier(0, $_SESSION["loggedId"], EtatPanier::EN_COURS);
            $servicePan->addPanier($panier);
            $panier = $servicePan->getPanierEnCoursByClt($_SESSION["loggedId"]);

        }
        $serviceLignePanier = new ServiceLignePanier();
        $qte = 1;
        if (isset($_SESSION['prod'])) {
            $prod = $_SESSION['prod'];
            unset($_SESSION['prod']);
        }else{
            $prod = $_GET['prod'];
        }
        if (isset($_SESSION['qte'])) {
            $qte = $_SESSION['qte'];
            unset($_SESSION['qte']);
        }else{
            if (isset($_POST['qte'])) {
                $qte = $_POST['qte'];
            }
        }





        $lignePanier = new LignePanier($prod, $qte, $panier['codePanier']);
        if (!$serviceLignePanier->prodExiste($prod, $panier['codePanier'])) {
            $serviceLignePanier->addLignePanier($lignePanier);
        } else {
            try {
                $serviceLignePanier->editLignePanier($lignePanier);
            } catch (LimitePanier) {
                header("Location: detail.php?etat=0");
                exit;
            }
        }

        header("Location: detail.php");
        exit;

    } else {
        if ($_SESSION['role'] == 'ADMIN') {
            header("Location: ../../admin/accueil/accueil.php");
            exit();
        }
    }
} else {
    $_SESSION['prod'] = $_GET['prod'];
    if (isset($_POST['qte'])) {
        $_SESSION['qte'] = $_POST['qte'];
    }
    header("Location: ../../public/auth/login.php?etat=2");
    exit();

}
