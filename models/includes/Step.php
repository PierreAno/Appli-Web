<?php

  class Step extends Database{

  public function createStep($statement1, $statement2){
    $sql = 'INSERT INTO tbldemarches VALUES (NULL, :name, :idCat)';
    $result = $this->getPDO()->prepare($sql);
    // Link the marker to a value
    $result->bindValue(':name', $statement1, PDO::PARAM_STR);
    $result->bindValue(':idCat', $statement2, PDO::PARAM_INT);
    $Create = $result->execute();
  }

  public function modifyStep($statement1, $statement2){
    $sql = 'UPDATE tbldemarches SET nom = :name WHERE tblcategories.id = :idstep';
    $result = $this->getPDO()->prepare($sql);
    // Link the marker to a value
    $result->bindValue(':idstep', $statement1, PDO::PARAM_INT);
    $result->bindValue(':name', $statement2, PDO::PARAM_STR);
    $Modify = $result->execute();
  }

  public function deleteStep($statement1, $statement2){
    $sql = 'DELETE FROM tbldemarches WHERE id = :idstep AND nom = :name LIMIT 1';
    $result = $this->getPDO()->prepare($sql);
    // Link the marker to a value
    $result->bindValue(':idstep', $statement1, PDO::PARAM_INT);
    $result->bindValue(':name', $statement2, PDO::PARAM_STR);
    $Delete = $result->execute();
  }
}
?>
idstep
