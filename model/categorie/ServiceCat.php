<?php

namespace categorie;

use Config;
use PDO;

require_once '../../../model/Config.php';

class ServiceCat
{
    private PDO $cnxBD;

    public function __construct()
    {
        $this->cnxBD = (new Config())->getPdo();
    }

    public function getCategories(): array
    {
        $sql = "SELECT * FROM categorie order by surCategorie";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getSurCat(int $id)
    {
        $sql = "SELECT * FROM categorie surCat join categorie cat on surCat.idCat = $id";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);

    }

    public function getSousCategories(): array
    {
        $sql = "SELECT * FROM categorie WHERE surCategorie is not null";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSurCats(): array

    {
        $sql = "SELECT * FROM categorie WHERE surCategorie is null ";
        $res = $this->cnxBD->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById(int $id)
    {
        $sql = "SELECT * FROM categorie WHERE idCat = $id";
        $res = $this->cnxBD->query($sql);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoriesBySurCategorie(int $id)
    {
        $sql = "SELECT * FROM categorie WHERE surCategorie = $id";
        $res = $this->cnxBD->query($sql);

        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory(Categorie $categorie): bool|int
    {

        $libelleCat = $categorie->getLibelleCat();
        $idSurCat = $categorie->getIdSurCat();
        $sql = "INSERT INTO categorie VALUES (null,'$libelleCat', $idSurCat)";
        return $this->cnxBD->exec($sql);

    }

    public function updateCategory(Categorie $categorie): bool|int
    {
        $idCat = $categorie->getIdCat();
        $libelleCat = $categorie->getLibelleCat();
        $idSurCat = $categorie->getIdSurCat();
        $sql = "UPDATE categorie SET libelleCat='$libelleCat', idSurCat='$idSurCat' WHERE id=$idCat";
        return $this->cnxBD->exec($sql);
    }

    public function deleteCategory(int $id): bool|int
    {
        $sql = "DELETE FROM categorie WHERE id=$id";
        return $this->cnxBD->exec($sql);
    }

}