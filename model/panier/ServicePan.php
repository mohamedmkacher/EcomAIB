<?php

namespace panier;

use Config;
use PDO;

require_once '../../../model/Config.php';


class ServicePan
{
    private PDO $cnxBD;

    public function __construct()
    {
        $this->cnxBD = ((new Config())->getPdo());
    }

    public function getPaniers(): array
    {
        $sql = "SELECT * FROM panier";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPanierById(int $id)
    {
        $sql = "SELECT * FROM panier WHERE codePanier = $id";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }


    public function getPanierEnCoursByClt(int $id){
        $sql="SELECT * FROM panier WHERE idClient=$id and etatPanier='EN_COURS'";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function validerPanier(int $codePan){
        $sql="UPDATE panier SET etatPanier='VALIDE' WHERE codePanier=$codePan";
        return $this->cnxBD->exec($sql);


    }

    public function addPanier(Panier $panier): bool|int
    {
        $idClt = $panier->getIdClt();
        $etatPan = $panier->getEtatPanier()->name;
        $sql = "INSERT INTO panier VALUES (null,$idClt,'$etatPan' )";
        return $this->cnxBD->exec($sql);
    }

    public function deletePanier(int $id): bool|int
    {
        $sql = "DELETE FROM panier WHERE codePan = $id";
        return $this->cnxBD->exec($sql);
    }

    public function editPanier(Panier $panier): bool|int
    {
        $codePan = $panier->getCodePanier();
        $idClt = $panier->getIdClt();
        $sql = "UPDATE panier SET idClt=$idClt WHERE codePan=$codePan";
        return $this->cnxBD->exec($sql);

    }




}