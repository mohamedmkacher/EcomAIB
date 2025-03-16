<?php
session_start();


if (isset($_SESSION['role'])) {
    header("Location: ../../" . $_SESSION['role'] . "/accueil/accueil.php");
    exit();
} else {
    include_once "../categorie/recuperer.php";



    $sousCategories = $serviceCat->getCategories();
    include_once "../../../view/public/accueil/accueil.php";
}
