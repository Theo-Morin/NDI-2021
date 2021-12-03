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


    static function create($imat,$name,$model,$motor,$launchDate){
        if($this->user->isLogged()){
            $link = File::upload($pics, "boats");
            $reqInsert = Database::getInstance()->prepare('INSERT INTO boats(imatriculation,bname,model,motor,launchDate,confirmed,oldRef,userId) VALUES (?)');
            
            $reqInsert->execute(array($imat,$name,$model,$motor,$launchDate,0,null,$this->user->getUserId()));
            Notification::create("success","the update are succesfull");
            if ($this->user->isAdmin()){
                $this.validate();
            }
            return true;
        }
        else{
            Notification::create("warning","you are not login");
            return false;
        }
    }

    static function update($imat,$name,$model,$motor,$launchDate){
        if($this->user->isLogged()){
            $link = File::upload($pics, "boats");
            $reqInsert = Database::getInstance()->prepare('INSERT INTO boats(imatriculation,bname,model,motor,launchDate,confirmed,oldRef,userId) VALUES (?)');
               
            $reqInsert->execute(array($imat,$name,$model,$motor,$launchDate,0,$id,$this->user->getUserId()));
            if ($this->user->isAdmin()){
                $this.validate();
            }
            Notification::create("success","the update are succesfull");
            return true;
        }
        else{
            Notification::create("warning","you are not login");
            return false;
        }
    }

    function delete(){
        if($this->user->isLogged()){
            $reqInsert = Database::getInstance()->prepare('DELETE FROM boats WHERE personId=?');
            $reqInsert->execute(array($id));
        }
    }

    function validate(){
        if($this->user->isLogged()){
            $reqInsert = Database::getInstance()->prepare('UPDATE boats SET confirmed=1 WHERE boatId=?');
            $reqInsert->execute(array($id));
            $reqOldRef = Database::getInstance()->prepare('SELECT boats.oldRef WHERE boatId=? ');
            $reqOldRef->execute(array($id));
            if ($reqOldRef->RowCount() >0){
                $reqDelete = Database::getInstance()->prepare('DELETE  FROM boats WHERE boatId=?');
                $reqDelete->execute(array($reqOldRef->Fetch()));
                $reqBlank = Database::getInstance()->prepare(' UPDATE boats SET oldRef=null WHERE boatId=?');
                $reqBlank->execute(array($id));
            }
        }
    }
}

?>
