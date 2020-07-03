<?php

  class ViewCategories extends Database {

    protected function getAllCategories() {

      $statement = "SELECT * FROM tblcategories";
      $sql = $this->getPDO()->query($statement);
      $result = $sql->fetchAll();
      return $result;
      }


    public function showAllCategories() {

      $datas = $this->getAllCategories();
      echo 'ID et nom des catégories'."<br>"."<br>";
      foreach ($datas as $data) {
        echo $data['id']." - ".$data['nom']."<br>";
      }
    }
  }

?>
