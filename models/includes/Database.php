<?php

  class Database{

    private $db_host;
    private $db_login;
    private $db_pass;
    private $db_name;
    private $pdo;

    public function __construct($db_name = 'projetstage', $db_login = 'root', $db_pass = '', $db_host = 'localhost') {
      $this->db_host = $db_host;
      $this->db_login = $db_login;
      $this->db_pass = $db_pass;
      $this->db_name = $db_name;
    }

    protected function getPDO(){
      if($this->pdo === null){
        $pdo = new PDO('mysql:dbname=projetstage;host=localhost','root' , '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
      }
      return $this->pdo;
    }

    public function query($statement){
      $sql = $this->getPDO()->query($statement);
      $datas=$sql->fetchAll(PDO::FETCH_OBJ);
      return $datas;
    }

    public function query1($statement){
      $sql = $this->getPDO()->query($statement);
      return $sql;
    }
  }

?>
