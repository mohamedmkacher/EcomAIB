<?php
session_start();


use adresse\ServiceAdr;

use commande\ServiceCmd;
use lignePanier\ServiceLignePanier;
use livraison\ServiceLiv;




require_once "../../../model/lignePanier/ServiceLignePanier.php";
require_once "../../../model/adresse/ServiceAdr.php";
require_once "../../../model/commande/ServiceCmd.php";
require_once "../../../model/livraison/ServiceLiv.php";

include_once "../../public/categorie/recuperer.php";


if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {
    $serviceLignePan = new ServiceLignePanier();
    $serviceCmd = new ServiceCmd();
    $serviceLivraison = new ServiceLiv();
    $serviceAdr = new ServiceAdr();

    if (isset($_GET['code'])) {
        $livraison = $serviceLivraison->getLivraisonByCmd($_GET['code']);
        $adresse=$serviceAdr->getAdresseById($livraison['idAdresseLiv']);
        $commande = $serviceCmd->getCommandeByCode($_GET['code']);
        $produits = $serviceLignePan->getLignesPanier($commande['codePanier']);
        include_once "../../../view/client/commande/detail.php";

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