<?php

namespace livraison;

use Config;
use PDO;

require_once '../../../model/Config.php';


class ServiceLiv
{
    private PDO $cnxBD;

    public function __construct()
    {
        $this->cnxBD = ((new Config())->getPdo());
    }

    public function getLivraisons(): array
    {
        $sql = "SELECT * FROM livraison";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getLivraisonById(int $id)
    {
        $sql = "SELECT * FROM livraison WHERE codeLiv = $id";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);

    }

    public function getLivraisonByCmd(int $id)
    {
        $sql = "SELECT * FROM livraison WHERE codeCmd=$id";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function addLivraison(Livraison $livraison): bool|int
    {
        $codeCmd = $livraison->getCodeCmd();

        $etatLiv = $livraison->getEtatLiv()->name;
        $fraixLiv = $livraison->getFraix();
        $idAdrLiv = $livraison->getIdAdrLiv();
        $sql = "INSERT INTO livraison VALUES (null,$codeCmd,$idAdrLiv,$fraixLiv,null,'$etatLiv')";
        return $this->cnxBD->exec($sql);
    }

    public function deleteLivraison(int $id): bool|int
    {
        $sql = "DELETE FROM livraison WHERE codeLiv = $id";
        return $this->cnxBD->exec($sql);
    }

    public function editLivraison(Livraison $livraison): bool|int
    {
        $codeLiv = $livraison->getCodeLiv();
        $codeCmd = $livraison->getCodeCmd();
        $dateLiv = $livraison->getDateLiv();
        $etatLiv = $livraison->getEtatLiv()->name;
        $fraixLiv = $livraison->getFraix();
        $idAdrLiv = $livraison->getIdAdrLiv();
        $sql = "UPDATE livraison SET codeCmd=$codeCmd,dateLiv=$dateLiv,etatLiv=$etatLiv,fraixLiv=$fraixLiv,idAdrLiv=$idAdrLiv WHERE codeLiv=$codeLiv";
        return $this->cnxBD->exec($sql);

    }


}