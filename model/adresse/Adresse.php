<?php

namespace adresse;

class Adresse
{
    private $idAdresse;
    private int $numBatiment;
    private string $rue;
    private string $ville;
    private string $gouvernorat;
    private string $codePostal;
    private int $idUtilisateur;


    public function __construct($idAdresse, int $numBatiment, string $rue, string $ville, string $gouvernorat, string $codePostal, int $idUtilisateur)
    {
        $this->idAdresse = $idAdresse;
        $this->numBatiment = $numBatiment;
        $this->rue = $rue;
        $this->ville = $ville;
        $this->gouvernorat = $gouvernorat;
        $this->codePostal = $codePostal;
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getIdAdresse()
    {
        return $this->idAdresse;
    }

    public function setIdAdresse($idAdresse): void
    {
        $this->idAdresse = $idAdresse;
    }

    public function getNumBatiment(): int
    {
        return $this->numBatiment;
    }

    public function setNumBatiment(int $numBatiment): void
    {
        $this->numBatiment = $numBatiment;
    }

    public function getRue(): string
    {
        return $this->rue;
    }

    public function setRue(string $rue): void
    {
        $this->rue = $rue;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    public function getGouvernorat(): string
    {
        return $this->gouvernorat;
    }

    public function setGouvernorat(string $gouvernorat): void
    {
        $this->gouvernorat = $gouvernorat;
    }

    public function getCodePostal(): string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): void
    {
        $this->codePostal = $codePostal;
    }

    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }



}