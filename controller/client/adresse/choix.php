<?php
session_start();


use adresse\ServiceAdr;



require_once "../../../model/adresse/ServiceAdr.php";
require_once "../../../model/categorie/ServiceCat.php";


include_once "../../public/categorie/recuperer.php";


if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {


    $serviceAdr = new ServiceAdr();
    $adresses = $serviceAdr->getAdressesByClient($_SESSION["loggedId"]);
    include_once "../../../view/client/adresse/choix.php";


} else {
    if ($_SESSION['role'] == 'ADMIN') {
        header("Location: ../../admin/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}