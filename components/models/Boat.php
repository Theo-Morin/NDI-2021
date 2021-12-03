<?php

class Boat {
    public $id;

    function getAll(){

        $req = Database::getInstance()->prepare('SELECT * FROM boats WHERE id = ?');
        $req->execute(array($id));
        return $req->FetchAll();
    }

    function getSaving(){

        $req = Database::getInstance()->prepare('SELECT savings.* FROM crews,savings WHERE crews.boatId = savings.boatId AND boatId = ?');
        $req->execute(array($id));
        return $req->FetchAll();
    }

    function nbPersonSave(){

        $req = Database::getInstance()->prepare('SELECT nbSave FROM crews, savings WHERE crews.savingId = savings.savingId AND boatid = ?');
        $req->execute(array($id));
        $tb=$req->RowCount();
        $req->FetchAll();
        $cmp = 0;
        for($i = 0; $i < $tb; $i++){
            $cmp = $cmp +$req[i];
        }
        return $cmp;

    }

    function getNbSaving(){

        $req = Database::getInstance()->prepare('SELECT nbSave FROM crews, savings WHERE crews.savingId = savings.savingId AND boatid = ?');
        $req->execute(array($id));
        return $req->RowCount();
    }

    function getBySearch($text){

        $req = Database::getInstance()->prepare('SELECT boatId,bname FROM boats WHERE bname LIKE ?%');
        $req->execute(array($text));
        return $req->FetchAll();

    }
}

?>
