<?php

namespace produit;

class Produit
{
    private $refProd;
    private string $libelleProd;
    private float $prixProd;
    private int $qteStock;
    private string $imageProd;
    private string $descriptionProd;
    private int $idCategorieProd;


    public function __construct($refProd, string $libelleProd, float $prixProd, int $qteStock, string $imageProd, string $descriptionProd, int $idCategorieProd)
    {
        $this->refProd = $refProd;
        $this->libelleProd = $libelleProd;
        $this->prixProd = $prixProd;
        $this->qteStock = $qteStock;
        $this->imageProd = $imageProd;
        $this->descriptionProd = $descriptionProd;
        $this->idCategorieProd = $idCategorieProd;
    }

    public function getRefProd()
    {
        return $this->refProd;
    }

    public function setRefProd($refProd): void
    {
        $this->refProd = $refProd;
    }

    public function getLibelleProd(): string
    {
        return $this->libelleProd;
    }

    public function setLibelleProd(string $libelleProd): void
    {
        $this->libelleProd = $libelleProd;
    }

    public function getPrixProd(): float
    {
        return $this->prixProd;
    }

    public function setPrixProd(float $prixProd): void
    {
        $this->prixProd = $prixProd;
    }

    public function getQteStock(): int
    {
        return $this->qteStock;
    }

    public function setQteStock(int $qteStock): void
    {
        $this->qteStock = $qteStock;
    }

    public function getImageProd(): string
    {
        return $this->imageProd;
    }

    public function setImageProd(string $imageProd): void
    {
        $this->imageProd = $imageProd;
    }

    public function getDescriptionProd(): string
    {
        return $this->descriptionProd;
    }

    public function setDescriptionProd(string $descriptionProd): void
    {
        $this->descriptionProd = $descriptionProd;
    }

    public function getIdCategorieProd(): int
    {
        return $this->idCategorieProd;
    }

    public function setIdCategorieProd(int $idCategorieProd): void
    {
        $this->idCategorieProd = $idCategorieProd;
    }


}