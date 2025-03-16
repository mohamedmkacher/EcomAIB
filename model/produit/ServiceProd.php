<?php

namespace produit;

use Config;
use PDO;

require_once '../../../model/Config.php';


class ServiceProd
{
    private PDO $cnxBD;

    public function __construct()
    {
        $this->cnxBD = ((new Config())->getPdo());
    }

    public function getProduits(): array
    {
        $sql = "SELECT p.*,c.libelleCat FROM produit p 
           join categorie c on p.categorieProd=c.idCat
           order by p.prixUnitaireProd";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduitById(int $id)
    {
        $sql = "SELECT * FROM produit WHERE refProd = $id";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduit(Produit $produit): bool|int
    {

        $libelleProd = $produit->getLibelleProd();
        $desc = $produit->getDescriptionProd();
        $prixunitaire = $produit->getPrixProd();
        $qte = $produit->getQteStock();
        $catProd = $produit->getIdCategorieProd();
        $img = $produit->getImageProd();
        $sql = "INSERT INTO produit VALUES (null,$libelleProd,$desc,$prixunitaire,$qte,$catProd,$img)";
        return $this->cnxBD->exec($sql);
    }

    public function getProdBySurCat(int $surCat)
    {
        $sql = "SELECT * 
                FROM produit p 
                    join categorie c on p.categorieProd=c.idCat
                    where c.surCategorie=$surCat 
order by p.PrixUnitaireProd;";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProduit(int $id): bool|int
    {
        $sql = "DELETE FROM produit WHERE refProd = $id";
        return $this->cnxBD->exec($sql);
    }

    public function editProduit(Produit $produit): bool|int
    {
        $ref = $produit->getRefProd();
        $libelleProd = $produit->getLibelleProd();
        $desc = $produit->getDescriptionProd();
        $prixunitaire = $produit->getPrixProd();
        $qte = $produit->getQteStock();
        $catProd = $produit->getIdCategorieProd();
        $img = $produit->getImageProd();
        $sql = "UPDATE produit SET libelleProd=$libelleProd,descriptionProd=$desc,prixUnitaireProd=$prixunitaire,qteStockProd=$qte,categorieProd=$catProd,imgProd=$img WHERE refProd=$ref";
        return $this->cnxBD->exec($sql);
    }

    public function getProduitByCat(int $id): array
    {
        $sql = "SELECT p.* ,c.libelleCat FROM produit p 
           join categorie c on p.categorieProd=c.idCat
           WHERE p.categorieProd = $id order by p.prixUnitaireProd";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function decStock(int $refProd, int $qte): bool|int
    {
        $sql = "UPDATE produit SET qteStockProd=qteStockProd-$qte WHERE refProd=$refProd";
        return $this->cnxBD->exec($sql);
    }


    public function rechercheProd(array $motsCles)
    {
        $sql = "
        SELECT p.*
        FROM produit p
        JOIN categorie c ON p.categorieProd = c.idCat
    WHERE  ";


        foreach ($motsCles as $mc) {
            $sql .= "
             (
                p.libelleProd LIKE '%$mc%'
                OR p.descriptionProd LIKE '%$mc%'
                OR c.libelleCat LIKE '%$mc%'
            )or";

        }
        $sql = substr($sql, 0, -2);
        $sql .= " order by p.prixUnitaireProd;";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }


}