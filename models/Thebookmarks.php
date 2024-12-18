<?php

class Thebookmarks
{
    private $id;

    private $dbConnection;
    private $theLINK;
    private $Description;
    private $theName;
    private $timeThatCreated;

    private $dbTable = 'infoBookmarks'; 

    public function __construct($dbConnection)
     { $this->dbConnection = $dbConnection;
    }

    public function getId(){
        return $this->id;}
    
 
    
    public function gettheLINK() {
        return $this->theLINK;
    }

    public function getDescription() {
        return $this->Description;
    }
  
 

    public function getTimeThatCreated() {
        return $this->timeThatCreated;}
    
    public function gettheName() {
        return $this->theName;
    }


    public function setId($id) {
        $this->id = $id;
    }

    public function settheLINK($theLINK) {
        $this->theLINK = $theLINK;
      }

   

    public function setDescription($Description) {
        $this->Description = $Description;
    }
    public function settheName($theName) {
        $this->theName = $theName;}

    public function setTimeThatCreated($timeThatCreated) {
        $this->timeThatCreated = $timeThatCreated; }

    public function create()
    { $query = "INSERT INTO " . $this->dbTable . " (theLINK, theName, Description, timeThatCreated) 
              VALUES (:theLINK, :theName, :Description, now())";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(":theLINK", $this->theLINK);
        $stmt->bindParam(":theName", $this->theName);
        $stmt->bindParam(":Description", $this->Description);
        if ($stmt->execute()) {
            return true; }

        printf("Error: %s", $stmt->error);
        return false; }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->dbTable . " WHERE id=:id";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute() && $stmt->rowCount() == 1) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            $this->id = $result->id;
            $this->theLINK = $result->theLINK;
            $this->Description = $result->Description;

            $this->theName = $result->theName;
            $this->timeThatCreated = $result->timeThatCreated;
            return true;
        }
        return false; }

    public function readAll()
    {
        $query = "SELECT * FROM " . $this->dbTable;
        $stmt = $this->dbConnection->prepare($query);
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];}

    public function update(){
     $query = "UPDATE " . $this->dbTable . " SET theLINK=:theLINK, theName=:theName, Description=:Description  WHERE id=:id";
      $stmt = $this->dbConnection->prepare($query);

        $stmt->bindParam(":theLINK", $this->theLINK);
        $stmt->bindParam(":Description", $this->Description);
        $stmt->bindParam(":theName", $this->theName);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();  }

    public function delete()
    {$query = "DELETE FROM " . $this->dbTable . " WHERE id=:id";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute() && $stmt->rowCount() == 1) {
            return true; }

        return false; }
}