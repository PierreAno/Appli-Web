<?php
abstract class Model{
    // Database information
    private $host = "localhost";
    private $db_name = "projetstage";
    private $username = "root";
    private $password = "";

    // Property that will contain the connection instance
    protected $_connexion;

    // Properties to customize requests
    public $table;
    public $id;

    public function getConnection(){
        // Delete the previous connection
        $this->_connexion = null;

        // Trying to connect to the base
        try{
            $this->_connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    public function getOne(){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
