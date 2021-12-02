<?php

class Person{

    private $id;

    function __construct($id){
        $this->id = $id;
    }

    function getAll(){
        $req = Database::getInstance()->prepare('SELECT * FROM persons WHERE id = ?');
        $req->execute(array($this->id));
        return $req->fetchAll();
    }

    function nbEquipages(){
        $req = Database::getInstance()->prepare('SELECT COUNT(id) FROM crews WHERE id = ?');
        $req->execute(array($this->id));
        echo  $req->fetchAll();
    }
}

?>