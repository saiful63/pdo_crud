<?php
include("db.php");

class student{

private $table="city";
private $name;
private $fname;
private $lname;

public function setName($nme){
$this->name = $nme;
}


public function setFname($frnm){
    $this->fname = $frnm;
}


public function setLname($lnm){
    $this->lname = $lnm;
}

public function readAll(){
    $sql="select * from $this->table";

    $stmt = connection::Fetching($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function store(){
   $sql = "insert into $this->table(name,fname,lname) values (:name,:fname,:lname)";
   $stmt = connection::Fetching($sql);
   $stmt->bindParam(':name' , $this->name);
   $stmt->bindParam(':fname' , $this->fname);
   $stmt->bindParam(':lname' , $this->lname);
   return $stmt->execute();
}

}


?>