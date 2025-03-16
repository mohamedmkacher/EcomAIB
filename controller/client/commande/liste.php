<?php
session_start();



use commande\ServiceCmd;



require_once "../../../model/commande/ServiceCmd.php";

include_once "../../public/categorie/recuperer.php";

if (isset($_SESSION["loggedId"])&& $_SESSION['role'] == 'CLIENT') {
    $serviceCmd = new ServiceCmd();
    $commandes = $serviceCmd->getCommandeByClient($_SESSION["loggedId"]);
    include_once "../../../view/client/commande/liste.php";
} else {
    if ($_SESSION['role'] == 'ADMIN') {
        header("Location: ../../admin/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}