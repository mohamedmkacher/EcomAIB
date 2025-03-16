<?php
session_start();


use lignePanier\ServiceLignePanier;
use livraison\EtatLivraison;
use livraison\Livraison;
use livraison\ServiceLiv;
use produit\ServiceProd;




require_once "../../../model/lignePanier/ServiceLignePanier.php";
require_once "../../../model/livraison/Livraison.php";
require_once "../../../model/livraison/EtatLivraison.php";
require_once "../../../model/livraison/ServiceLiv.php";
require_once "../../../model/produit/ServiceProd.php";


include_once "../../public/categorie/recuperer.php";


if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {
    if (isset($_POST["comfirmerAdr"])) {
        $_SESSION["adr"] = $_POST["idAdresse"];
    }
    $serviceLignePanier = new ServiceLignePanier();
    $fraix = 0;
    $totCmd = $serviceLignePanier->calculTot($_SESSION["panier"]);
    if ($totCmd < 500) {
        $fraix = 10;
    } else if ($totCmd < 1000) {
        $fraix = 20;
    }
    $livraison = new Livraison(0, $_SESSION["codeCommande"], EtatLivraison::EN_ATTENTE, $_SESSION["adr"], $fraix);
    $serviceLivraison = new ServiceLiv();
    $serviceLivraison->addLivraison($livraison);
    $serviceLignePan = new ServiceLignePanier();
    $serviceProd = new ServiceProd();

    $produits = $serviceLignePan->getLignesPanier($_SESSION["panier"]);
    foreach ($produits as $produit) {
        $serviceProd->decStock($produit["refProd"], $produit["qte"]);
    }

    header("location: ../commande/detail.php?code=" . $_SESSION["codeCommande"]);

} else {
    if ($_SESSION['role'] == 'ADMIN') {
        header("Location: ../../admin/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}