<?php

namespace livraison;



class Livraison
{
    private $codeLiv;
    private int $codeCmd;
    private EtatLivraison $etatLiv;
    private int $idAdrLiv;
    private float $fraix;
    private Date $dateLiv;


    public function __construct($codeLiv, int $codeCmd, EtatLivraison $etatLiv, int $idAdrLiv, float $fraix)
    {
        $this->codeLiv = $codeLiv;
        $this->codeCmd = $codeCmd;

        $this->etatLiv = $etatLiv;
        $this->idAdrLiv = $idAdrLiv;
        $this->fraix = $fraix;

    }

    public function getCodeLiv()
    {
        return $this->codeLiv;
    }

    public function setCodeLiv($codeLiv): void
    {
        $this->codeLiv = $codeLiv;
    }

    public function getCodeCmd(): int
    {
        return $this->codeCmd;
    }

    public function setCodeCmd(int $codeCmd): void
    {
        $this->codeCmd = $codeCmd;
    }



    public function getEtatLiv(): EtatLivraison
    {
        return $this->etatLiv;
    }

    public function setEtatLiv(EtatLivraison $etatLiv): void
    {
        $this->etatLiv = $etatLiv;
    }

    public function getIdAdrLiv(): int
    {
        return $this->idAdrLiv;
    }

    public function setIdAdrLiv(int $idAdrLiv): void
    {
        $this->idAdrLiv = $idAdrLiv;
    }

    public function getFraix(): float
    {
        return $this->fraix;
    }

    public function setFraix(float $fraix): void
    {
        $this->fraix = $fraix;
    }

    public function getDateLiv(): Date
    {
        return $this->dateLiv;
    }

    public function setDateLiv(Date $dateLiv): void
    {
        $this->dateLiv = $dateLiv;
    }




}