<?php
if (file_exists("../models/db.php")) {
    include "../models/db.php";
} else {
    include "models/db.php";
}


/**
 *
 */
class Articles {

    private $_id;
    private $_user_id;
    private $_img;
    private $_statut;
    private $_auteur;

    function __construct($id = false) {

        if($id) {
            global $db;

            $sql = "SELECT user_id, lien,auteur, statut,  FROM album WHERE id = $id";
            $req = $db->prepare($sql);

            if($req->execute()) {

                $res = $req->fetch(PDO::FETCH_OBJ);

                $this->_id = $id;
                $this->_user_id = $res->user_id;
                $this->_img = $res->lien;
                $this->_statut = $res->statut;
                $this->_auteur = $res->auteur;

            } else {
                error_log("SQL ERROR : $sql", 0);
            }
        }


    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    function getUserId() {
        return $this->_user_id;
    }

    function getAuteur() {
        return $this->_auteur;
    }
    function setUserId($userId) {
        $this->_user_id = $userId;
    }

    public function getStatut() {
        return $this->_statut;
    }

    public function setStatut($statut) {
        $this->_statut = $statut;
    }
    function setAuteur($auteur) {
        $this->_auteur = $auteur;
    }
    public function getImg() {
        return $this->_img;
    }
   
    public function setImg($img): void {
        $this->_img = $img;
    }

    public function insert() {
        global $db;

        $sql = "INSERT INTO album (user_id, lien, auteur, statut) VALUES($this->_user_id, '$this->_img','$this->_auteur',$this->_statut)";
        $req = $db->prepare($sql);

        if($req->execute()) {

            return true;

        } else {
            error_log("SQL ERROR : $sql", 0);
        }
        return false;
    }
    
    public function achieve() {
        global $db;
        
        $id = $this->_id;
        $sql = "UPDATE album SET statut = 1 WHERE id = $id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public function delete() {
        global $db;

        if(unlink("../album/imgs/".$this->_img)) {
            if(!empty($this->_img_2)) {
                unlink("../album/imgdeux/".$this->_img_2);
            }
            $id = $this->_id;
            $sql = "DELETE FROM album WHERE id = $id";
            $req = $db->prepare($sql);

            if($req->execute()) {
                return true;
            }
        }

        return false;
    }
    
    public function getUserLogin() {
        global $db;
        
        if(gettype($this->_user_id) == "string" && strlen($this->_user_id) > 4) {
            error_log("discord id : ".$this->_user_id, 0);
            $sql = "SELECT login FROM users WHERE discord_id = $this->_user_id";
        } else {
            error_log("id : ".$this->_user_id, 0);
            $sql = "SELECT login FROM users WHERE id = $this->_user_id";
        }
        
        //$sql = "SELECT login FROM users WHERE id = $this->_user_id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            $res = $req->fetch(PDO::FETCH_OBJ);
            return $res->login;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }

    public static function getPending() {
        global $db;

        $sql = "SELECT id FROM album WHERE statut = 0 ORDER BY date_insert ASC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
    }
    
    public static function getAchieved() {
        global $db;

        $sql = "SELECT id FROM album WHERE statut = 1 ORDER BY date_insert DESC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
        
        
    }
    
    public static function getNbArticles() {
        global $db;

        $sql = "SELECT count(id) as nb FROM album WHERE statut = 0";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetch(PDO::FETCH_OBJ);
            return $res->nb;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
  
    
    public static function getLasts() {
        global $db;

        $sql = "SELECT id FROM album WHERE statut = 1 ORDER BY date_insert DESC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
        
    }
    
  

}