<?php
session_start();

use auth\Authentification;
use categorie\ServiceCat;
use exceptions\UtilisateurExisteDeja;
use utilisateur\RoleUtilisateur;
use utilisateur\Utilisateur;


require_once "../../../model/auth/Authentification.php";
require_once "../../../model/exceptions/UtilisateurExisteDeja.php";



include_once "../categorie/recuperer.php";

$auth = new Authentification();
if (isset($_GET['etat'])) {
    $etat = $_GET['etat'];
    switch ($etat) {
        case 0:
            echo "<script>alert('les mots de passe ne correspondent pas')</script>";
            break;
        case 1:
            echo "<script>alert('utilisateur existe deja')</script>";
            break;

    }
}
if (isset($_POST['signup'])) {
    $_POST = array_map(fn($value): string => htmlspecialchars($value), $_POST);
    $utilisateur = new Utilisateur(0, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'], RoleUtilisateur::CLIENT);
    try {
        $auth->creerCompte($utilisateur);

    } catch (UtilisateurExisteDeja) {
        header('Location: signUp.php?etat=1');
        exit();
    }
    if ($_POST['mdp'] != $_POST['mdp2']) {
        header('Location: signUp.php?etat=0');
        exit();
    }
    header('Location: login.php');
    exit();

}
include '../../../view/public/auth/signUp.php';

