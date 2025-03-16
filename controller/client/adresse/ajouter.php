<?php
session_start();


use adresse\Adresse;
use adresse\ServiceAdr;



require_once "../../../model/adresse/ServiceAdr.php";
require_once "../../../model/adresse/Adresse.php";
require_once "../../../model/categorie/ServiceCat.php";


include_once "../../public/categorie/recuperer.php";


if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {

    if (isset($_POST["ajouterAdr"])) {
        $_POST = array_map(fn($value): string => htmlspecialchars($value), $_POST);
        $adr = new Adresse(0, +$_POST["numBatiment"], $_POST["rue"], $_POST["ville"], $_POST["gouvernorat"], $_POST["codePostal"], $_SESSION["loggedId"]);
        $serviceAdr = new ServiceAdr();
        $idAdr = $serviceAdr->addAdresse($adr);
        $_SESSION["adr"] = $idAdr;
        header("Location: ../livraison/ajouter.php");

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