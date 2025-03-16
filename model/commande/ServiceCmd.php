<?php

namespace commande;

use Config;
use PDO;

require_once '../../../model/Config.php';


class ServiceCmd
{
    private PDO $cnxBD;

    public function __construct()
    {
        $this->cnxBD = (new Config())->getPdo();
    }


    public function getCommandes(): array
    {
        $sql = "SELECT * FROM commande";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommandeByCode(int $id)
    {
        $sql = "SELECT * FROM commande WHERE codeCmd = $id";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function addCommande(Commande $commande): bool|int
    {

        $idClient = $commande->getIdClient();
        $total = $commande->getTotalCmd();
        $date = $commande->getDateCmd()->format('Y-m-d');

        $etat = $commande->getEtatCmd()->name;
        $codePanier = $commande->getCodePanier();
        $sql = "INSERT INTO COMMANDE VALUES (NULL,$idClient,$total,date '$date','$etat',$codePanier)";
        return $this->cnxBD->exec($sql);
    }
    public function getCommandeByCodePan(int $code){
        $sql="SELECT * FROM commande WHERE codePanier=$code";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCommande(Commande $commande): bool|int
    {
        $idClient = $commande->getIdClient();
        $total = $commande->getTotalCmd();
        $date = $commande->getDateCmd();
        $etat = $commande->getEtatCmd()->name;
        $codePanier = $commande->getCodePanier();
        $codeCmd = $commande->getCodeCmd();
        $sql = "UPDATE commande set idClient=$idClient,totalCmd=$total,dateCmd=$date,etatCmd=$etat,codePanier=$codePanier WHERE codeCmd=$codeCmd";
        return $this->cnxBD->exec($sql);
    }

    public function deleteCommande(int $id): bool|int
    {
        $sql = "DELETE FROM commande WHERE idCommande=$id";
        return $this->cnxBD->exec($sql);
    }

    public function getCommandeByClient(int $id){
        $sql="SELECT * FROM commande WHERE idClient=$id";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);

    }


}