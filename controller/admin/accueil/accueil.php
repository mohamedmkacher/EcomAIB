<?php
session_start();
if (isset($_SESSION['loggedId']) && $_SESSION['role'] == 'ADMIN') {


    include_once "../../../view/admin/accueil/accueil.php";
} else {
    if ($_SESSION['role'] == 'CLIENT') {
        header("Location: ../../client/accueil/accueil.php");
        exit();
    } else {
        header("Location: ../../public/auth/login.php?etat=2");
        exit();
    }
}
