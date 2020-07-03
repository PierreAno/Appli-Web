<?php

  class Category extends Database{

  public function createCategory($statement){
    $sql = 'INSERT INTO tblcategories VALUES (NULL, :name)';
    $result = $this->getPDO()->prepare($sql);
    // Link the marker to a value
    $result->bindValue(':name', $statement, PDO::PARAM_STR);
    $Create = $result->execute();
  }

  public function modifyCategory($statement1, $statement2){
    $sql = 'UPDATE tblcategories SET nom = :name WHERE tblcategories.id = :idcat';
    $result = $this->getPDO()->prepare($sql);
    // Link the marker to a value
    $result->bindValue(':idcat', $statement1, PDO::PARAM_INT);
    $result->bindValue(':name', $statement2, PDO::PARAM_STR);
    $Modify = $result->execute();
  }

  public function deleteCategory($statement1, $statement2){
    $sql = 'DELETE FROM tblcategories WHERE id = :idcat AND nom = :name LIMIT 1';
    $result = $this->getPDO()->prepare($sql);
    // Link the marker to a value
    $result->bindValue(':idcat', $statement1, PDO::PARAM_INT);
    $result->bindValue(':name', $statement2, PDO::PARAM_STR);
    $Delete = $result->execute();
  }
}
?>
