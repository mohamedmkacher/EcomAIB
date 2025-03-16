<?php

namespace commande;


use DateTime;

class Commande
{
    private $codeCmd;
    private int $idClient;
    private float $totalCmd;
    private DateTime $dateCmd;
    private EtatCommande $etatCmd;

    private int $codePanier;


    public function __construct($idCmd, int $idClient, float $totalCmd, DateTime $dateCmd, EtatCommande $etatCmd, int $codePanier)
    {
        $this->codeCmd = $idCmd;
        $this->idClient = $idClient;
        $this->totalCmd = $totalCmd;
        $this->dateCmd = $dateCmd;
        $this->etatCmd = $etatCmd;
        $this->codePanier = $codePanier;
    }


    public function getCodeCmd()
    {
        return $this->codeCmd;
    }

    public function setCodeCmd($codeCmd): void
    {
        $this->codeCmd = $codeCmd;
    }

    public function getIdClient(): int
    {
        return $this->idClient;
    }

    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }

    public function getTotalCmd(): float
    {
        return $this->totalCmd;
    }

    public function setTotalCmd(float $totalCmd): void
    {
        $this->totalCmd = $totalCmd;
    }

    public function getDateCmd(): DateTime
    {
        return $this->dateCmd;
    }

    public function setDateCmd(DateTime $dateCmd): void
    {
        $this->dateCmd = $dateCmd;
    }

    public function getEtatCmd(): EtatCommande
    {
        return $this->etatCmd;
    }

    public function setEtatCmd(EtatCommande $etatCmd): void
    {
        $this->etatCmd = $etatCmd;
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