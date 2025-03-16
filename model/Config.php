<?php
class Config
{
    private $pdo;
    function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=ecomaib";
        $user = "root";
        $pw = "";
        $this->pdo = new PDO($dsn, $user, $pw);
    }



    public function getPdo()
    {
        return $this->pdo;
    }
}
