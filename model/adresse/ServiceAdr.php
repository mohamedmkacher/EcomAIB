<?php

namespace adresse;

use Config;
use PDO;

require_once '../../../model/Config.php';

class ServiceAdr
{
    private PDO $cnxBD;

    public function __construct()
    {
        $this->cnxBD = (new Config())->getPdo();
    }

    public function getAdresses(): array
    {
        $sql = "SELECT * FROM adresse";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdresseById(int $id)
    {
        $sql = "SELECT * FROM adresse WHERE idAdresse = $id";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function getAdressesByClient(int $id): array
    {
        $sql = "SELECT * FROM adresse WHERE idClient = $id";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAdresse(Adresse $adresse): false|int
    {

        $numBatiment = $adresse->getNumBatiment();
        $rue = $adresse->getRue();
        $ville = $adresse->getVille();
        $region = $adresse->getGouvernorat();
        $codePostal = $adresse->getCodePostal();
        $idUtilisateur = $adresse->getIdUtilisateur();
        $sql = "INSERT INTO adresse values (null,$numBatiment,'$rue','$ville','$region',$codePostal,$idUtilisateur)";
        $this->cnxBD->exec($sql);
        return $this->cnxBD->lastInsertId();
    }

    public function updateAdresse(Adresse $adresse): bool|int
    {
        $id = $adresse->getIdAdresse();
        $numBatiment = $adresse->getNumBatiment();
        $rue = $adresse->getRue();
        $ville = $adresse->getVille();
        $region = $adresse->getGouvernorat();
        $codePostal = $adresse->getCodePostal();
        $idUtilisateur = $adresse->getIdUtilisateur();
        $sql = "UPDATE adresse SET numBatiment = $numBatiment,rue='$rue',ville='$ville',region='$region',codePostal='$codePostal',idUtilisateur='$idUtilisateur' WHERE id = $id";
        return $this->cnxBD->exec($sql);
    }

    public function deleteAdresse(int $id): bool|int
    {
        $sql = "DELETE FROM adresse WHERE idAdresse = $id";
        return $this->cnxBD->exec($sql);
    }

}