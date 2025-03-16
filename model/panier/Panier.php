<?php

namespace panier;

class Panier
{
    private $codePanier;
    private int $idClt;
    private EtatPanier  $etatPanier;

    /**
     * @param $codePanier
     * @param int $idClt
     * @param EtatPanier $etatPanier
     */
    public function __construct($codePanier, int $idClt, EtatPanier $etatPanier)
    {
        $this->codePanier = $codePanier;
        $this->idClt = $idClt;
        $this->etatPanier = $etatPanier;
    }


    public function getCodePanier()
    {
        return $this->codePanier;
    }

    public function setCodePanier($codePanier): void
    {
        $this->codePanier = $codePanier;
    }

    public function getIdClt(): int
    {
        return $this->idClt;
    }

    public function setIdClt(int $idClt): void
    {
        $this->idClt = $idClt;
    }

    public function getEtatPanier(): EtatPanier
    {
        return $this->etatPanier;
    }

    public function setEtatPanier(EtatPanier $etatPanier): void
    {
        $this->etatPanier = $etatPanier;
    }





}