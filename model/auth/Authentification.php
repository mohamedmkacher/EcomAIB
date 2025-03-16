<?php

namespace auth;


use Config;
use exceptions\UtilisateurExisteDeja;
use exceptions\UtilisateurInexistant;
use PDO;
use utilisateur\Utilisateur;

require_once '../../../model/utilisateur/RoleUtilisateur.php';
require_once '../../../model/Config.php';
require_once '../../../model/exceptions/UtilisateurExisteDeja.php';
require_once '../../../model/exceptions/UtilisateurInexistant.php';
require_once '../../../model/utilisateur/Utilisateur.php';

class Authentification
{
    protected PDO $bd;

    public function __construct()
    {
        $this->bd = (new Config())->getPdo();
    }

    public function creerCompte(Utilisateur $utilisateur): bool
    {
        $compteCree = false;
        $email = trim($utilisateur->getEmail());
        $existe = $this->bd->query("SELECT * FROM utilisateur WHERE email='$email' ");
        $existe = $existe->fetchAll(PDO::FETCH_ASSOC);
        if (count($existe) == 0) {
            $nom = trim($utilisateur->getNom());
            $prenom = trim($utilisateur->getPrenom());
            $mdp = trim($utilisateur->getMdp());
            $mdpCript = md5($mdp);
            $role = $utilisateur->getRole()->name;
            echo $role;
            $sql = "INSERT INTO utilisateur  VALUES (null, '$nom','$prenom','$email','$mdpCript','$role')";
            $exec = $this->bd->exec($sql);
            if ($exec) {
                $compteCree = true;
            }
        } else {
            throw new UtilisateurExisteDeja();
        }
        return $compteCree;


    }

    public function seConnecter(string $email, string $mdp): bool
    {
        $email = trim($email);
        $mdp = trim($mdp);
        $comforme = false;
        $sql = "SELECT mdp FROM utilisateur WHERE email='$email'";
        $this->bd->query($sql);
        $mdpBD = $this->bd->query($sql)->fetch(PDO::FETCH_ASSOC);
        if (isset($mdpBD['mdp'])) {
            if ($mdpBD['mdp'] == md5($mdp)) {
                $comforme = true;
            }
        } else {
            throw new UtilisateurInexistant();
        }
        return $comforme;
    }


    public function getRoleUtilisateur(string $email)
    {
        $sql = "SELECT role FROM utilisateur WHERE email='$email'";
        $exec = $this->bd->query($sql);
        return $exec->fetch(PDO::FETCH_ASSOC)['role'];
    }

    public function getUserId(string $email): int
    {
        $sql = "SELECT idUtilisateur FROM utilisateur WHERE email='$email'";
        $exec = $this->bd->query($sql);
        return intval($exec->fetch(PDO::FETCH_ASSOC)['idUtilisateur']);
    }


    public function setLoggedUser(int $userId): void
    {
        session_regenerate_id(true);
        $_SESSION["loggedId"] = $userId;
    }

    public function log_user_out(): void
    {
        session_regenerate_id(true);
        $_SESSION["logged_in_user"] = null;
    }


}