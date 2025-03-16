<?php

namespace lignePanier;

class LignePanier

{
    private int $refProd;
    private int $qte;
    private int $codePanier;


    public function __construct(int $refProd, int $qte, int $codePanier)
    {
        $this->refProd = $refProd;
        $this->qte = $qte;
        $this->codePanier = $codePanier;
    }

    public function getRefProd(): int
    {
        return $this->refProd;
    }

    public function setRefProd(int $refProd): void
    {
        $this->refProd = $refProd;
    }

    public function getQte(): int
    {
        return $this->qte;
    }

    public function setQte(int $qte): void
    {
        $this->qte = $qte;
    }

    public function getCodePanier(): int
    {
        return $this->codePanier;
    }

    public function setCodePanier(int $codePanier): void
    {
        $this->codePanier = $codePanier;
    }




}