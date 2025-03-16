<?php
session_start();



use commande\Commande;
use commande\EtatCommande;
use commande\ServiceCmd;
use lignePanier\ServiceLignePanier;
use panier\ServicePan;



require_once "../../../model/commande/Commande.php";
require_once "../../../model/commande/EtatCommande.php";
require_once "../../../model/commande/ServiceCmd.php";
require_once "../../../model/panier/ServicePan.php";
require_once "../../../model/lignePanier/ServiceLignePanier.php";

include_once "../../public/categorie/recuperer.php";


if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {
    if (isset($_POST['valide'])) {
        $servicePan = new ServicePan();
        $panier = $servicePan->getPanierEnCoursByClt($_SESSION["loggedId"]);
        $serviceLignePan = new ServiceLignePanier();
        $serviceCmd = new ServiceCmd();
        $servicePan->validerPanier($panier['codePanier']);
        $tot = $serviceLignePan->calculTot($panier['codePanier']);
        $commande = new Commande(0, $_SESSION["loggedId"], $tot, new DateTime(), EtatCommande::EN_PREPARATION, $panier['codePanier']);
        $serviceCmd->addCommande($commande);
        $commande = $serviceCmd->getCommandeByCodePan($panier['codePanier']);
        $_SESSION["codeCommande"] = $commande['codeCmd'];
        $_SESSION["panier"] = $commande['codePanier'];
        header("location: ../adresse/choix.php");
        exit();
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