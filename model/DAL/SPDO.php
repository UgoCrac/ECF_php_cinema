<?php

class SPDO
{
    private $PDOInstance = null;
    private static $instance = null;

    private function __construct()
    {
        $this->PDOInstance = new PDO("mysql:host=localhost:3306;dbname=webfilm", "root", "");
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new SPDO();
        }
        return self::$instance;
    }

    public function query($query)
    {
        return $this->PDOInstance->query($query);
    }

    public function prepare($query)
    {
        return $this->PDOInstance->prepare($query);
    }

    // Récupère l'instance de l'objet PDO qui permettra d'acceder a la fonction lastInsertId()
    public function getPDO()
    {
        return $this->PDOInstance;
    }
}
