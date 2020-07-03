<?php

  class ViewSteps extends Database {

    protected function getAllSteps() {

      $statement = "SELECT * FROM tbldemarches";
      $sql = $this->getPDO()->query($statement);
      $result = $sql->fetchAll();
      return $result;
    }

    public function showAllSteps() {

      $datas = $this->getAllSteps();
      echo 'ID et nom des démarches'."<br>"."<br>";
      foreach ($datas as $data) {
        echo $data['id']." - ".$data['nom']."<br>";
      }
    }
  }

?>
