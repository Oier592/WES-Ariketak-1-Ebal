<?php

// Datu basera konektatzeko erabiliko den klasea.
// Klase hau objektuak erabiliko dute gero objektu hauen kontroladoreek datu basean CRUD eragiketak egin ahal izateko.

class DB
{
    private $konexioa;
    private $user;
    private $host;
    private $pass;
    private $db;

    // Atributu hauek datu basera konektatzeko behar diren kredentzialak dira.
    public function __construct()
    {
        $this->user = "root";
        $this->host = "localhost";
        $this->pass = "Huevo.";
        $this->db = "hackaton";
    }

    public function konektatu()
    {
        $this->konexioa = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->konexioa->connect_errno) {
            printf("Konexio errorea: %s\n", $this->konexioa->connect_error);
            die();
        } else {
            return $this->konexioa;
        }
    }

    // Konexioa lortu eta jarraian, beste klaseek erabiliko dute.
    public function getKonexioa()
    {
        return $this->konexioa;
    }

    public function __destruct()
    {
        if ($this->konexioa) {
            $this->konexioa->close();
        }
    }
}