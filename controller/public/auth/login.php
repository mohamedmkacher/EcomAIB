<?php
session_start();

use auth\Authentification;
use exceptions\UtilisateurInexistant;
use utilisateur\RoleUtilisateur;

require_once "../../../model/auth/Authentification.php";
require_once "../../../model/exceptions/UtilisateurInexistant.php";


include_once "../categorie/recuperer.php";

$auth = new Authentification();
if (isset($_GET['etat'])) {
    $etat = $_GET['etat'];
    switch ($etat) {
        case 0:
            echo "<script>alert('utilisateur inexistant')</script>";
            break;
        case 1:
            echo "<script>alert('mot de passe incorrect')</script>";
            break;
        case 2:
            echo "<script>alert('Veillez vous connecter pour continuer')</script>";
            break;

    }
}
if (isset($_POST['login'])) {
    $_POST = array_map(fn($value): string => htmlspecialchars($value), $_POST);
    $comforme = false;
    try {
        $comforme = $auth->seConnecter($_POST['email'], $_POST['mdp']);
    } catch (UtilisateurInexistant) {
        header("Location: login.php?etat=0");
        exit();
    }
    if ($comforme) {
        $role = $auth->getRoleUtilisateur($_POST['email']);
        $_SESSION['role'] = $role;
        $auth->setLoggedUser($auth->getUserId($_POST['email']));
        if ($role == RoleUtilisateur::ADMIN->name) {
            header('location:../../admin/accueil/accueil.php');
            exit();
        } else {
            if ($role == RoleUtilisateur::CLIENT->name) {
                if (isset($_SESSION['prod'])) {

                    header('location:../../client/panier/ajout.php');
                    exit();
                } else {

                    header('location:../../client/accueil/accueil.php');
                    exit();
                }
            }
        }
    } else {
        header('Location: login.php?etat=1');
    }
    exit();
}
include_once '../../../view/public/auth/login.php';
