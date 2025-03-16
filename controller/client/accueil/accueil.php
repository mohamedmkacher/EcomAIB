<?php
session_start();
if (isset($_SESSION['loggedId']) && $_SESSION['role'] == 'CLIENT') {
    include_once "../../public/categorie/recuperer.php";
    include_once "../../../view/client/accueil/accueil.php";
} else {
    if ($_SESSION['role'] == 'ADMIN') {
        header("Location: ../../admin/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}
