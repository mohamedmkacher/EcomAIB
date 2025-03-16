<?php

namespace categorie;

class Categorie
{
    private $idCat;
    private string $libelleCat;
    private $idSurCat;


    public function __construct($idCat, string $libelleCat, $idSurCat)
    {
        $this->idCat = $idCat;
        $this->libelleCat = $libelleCat;
        $this->idSurCat = $idSurCat;
    }

    public function getIdCat()
    {
        return $this->idCat;
    }

    public function setIdCat($idCat): void
    {
        $this->idCat = $idCat;
    }

    public function getLibelleCat(): string
    {
        return $this->libelleCat;
    }

    public function setLibelleCat(string $libelleCat): void
    {
        $this->libelleCat = $libelleCat;
    }

    public function getIdSurCat()
    {
        return $this->idSurCat;
    }


    public function setIdSurCat($idSurCat): void
    {
        $this->idSurCat = $idSurCat;
    }




}