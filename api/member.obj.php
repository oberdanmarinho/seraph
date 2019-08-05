<?php

class Member {
    private $conn;

    public $id;
    public $name;
    public $office;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function GetAll(){
        $query = "SELECT id, name, office FROM crud_members ORDER BY name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function GetById(){
        $query = "SELECT id, name, office FROM crud_members WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id); 
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
        $this->office = $row['office'];
    }

    function update(){
        $query = "UPDATE crud_members SET name= :name, office=:office WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->office=htmlspecialchars(strip_tags($this->office));
    
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':office', $this->office);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }    

    function delete(){
        $query = "DELETE FROM crud_members WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }    

    function create(){
        $query = "INSERT INTO crud_members (name, office) VALUES (:name, :office)";
        $stmt = $this->conn->prepare($query);
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->office=htmlspecialchars(strip_tags($this->office));
    
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":office", $this->office);

        if($stmt->execute()){
            return true;
        }
        return false;
    }    
}