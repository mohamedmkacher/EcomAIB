<?php

namespace lignePanier;

use Config;
use exceptions\LimitePanier;
use PDO;

require_once '../../../model/Config.php';
require_once '../../../model/exceptions/LimitePanier.php';

class ServiceLignePanier
{
    private PDO $cnxBD;

    public function __construct()
    {
        $this->cnxBD = ((new Config())->getPdo());
    }

    public function getLignesPanier(int $id): array
    {
        $sql = "SELECT p.refProd, p.libelleProd,lp.qte,p.prixUnitaireProd
    FROM ligne_panier lp
    join produit p on p.refProd = lp.refProd
    WHERE lp.codePanier=$id";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    public function addLignePanier(LignePanier $lignePanier): bool|int
    {
        $refProd = $lignePanier->getRefProd();
        $codePanier = $lignePanier->getCodePanier();
        $qte = $lignePanier->getQte();
        $sql = "INSERT INTO ligne_panier VALUES ($refProd,$codePanier,$qte)";
        return $this->cnxBD->exec($sql);
    }

    public function calculTot(int $codePanier): float|null
    {
        $sql = "SELECT SUM(p.prixUnitaireProd*lp.qte) as tot 
                FROM ligne_panier lp 
                    join produit p 
                        on lp.refProd=p.refProd 
                WHERE lp.codePanier=$codePanier";
        $res = $this->cnxBD->query($sql);
        $res = $res->fetch(PDO::FETCH_ASSOC);
        return $res['tot'];

    }

    public function deleteLignePanier(int $refProd, int $codePanier): false|int
    {
        $sql = "DELETE FROM ligne_panier WHERE refProd=$refProd and codePanier=$codePanier";
        return $this->cnxBD->exec($sql);
    }

    public function prodExiste(int $refProd, int $codePanier): bool
    {
        $sql = "SELECT * FROM ligne_panier WHERE refProd=$refProd and codePanier=$codePanier";
        $res = $this->cnxBD->query($sql);
        $res = $res->fetchAll(PDO::FETCH_ASSOC);

        return !empty($res);
    }

    public function editLignePanier(LignePanier $lignePanier): false|int
    {
        $refProd = $lignePanier->getRefProd();
        $codePanier = $lignePanier->getCodePanier();
        $qte = $lignePanier->getQte();
        $sql = "select qte from ligne_panier where codePanier=$codePanier and refProd=$refProd and codePanier=$codePanier";
        $res = $this->cnxBD->query($sql);
        $res = $res->fetch(PDO::FETCH_NUM);
        $qtePan = $res[0];
        if ($qte + $qtePan > 10) {
            $sql = "UPDATE ligne_panier SET qte=10 WHERE refProd=$refProd and codePanier=$codePanier";
            $this->cnxBD->exec($sql);
            throw new LimitePanier();
        } else {
            if ($qtePan + $qte == 0) {
                return $this->deleteLignePanier($refProd, $codePanier);
            } else {
                $sql = "UPDATE ligne_panier SET qte=$qte+$qtePan WHERE refProd=$refProd and codePanier=$codePanier";
                return $this->cnxBD->exec($sql);
            }

        }


    }

}