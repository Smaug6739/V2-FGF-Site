<?php

include '../models/db.php';

class Annonces {
    private $_id;
    private $_admin_id;
    private $_title;
    private $_link;
    private $_link_title;
    private $_annonce;
    private $_date;
    
    function __construct($id = false) {
        
        if($id) {
            global $db;
            
            $sql = "SELECT admin_id, titre, annonce, lien, titre_lien, date_insert FROM annonces WHERE id = $id";
            $req = $db->prepare($sql);
            
            if($req->execute()) {
                $res = $req->fetch(PDO::FETCH_OBJ);
                
                $this->_id = $id;
                $this->_admin_id = $res->admin_id;
                $this->_title = $res->titre;
                $this->_link = $res->lien;
                $this->_link_title = $res->titre_lien;
                $this->_annonce = $res->annonce;
                $this->_date = $res->date_insert;
            }
        }
    }
    
    public function getId() {
        return $this->_id;
    }

    public function getAdmin_id() {
        return $this->_admin_id;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getLink() {
        return $this->_link;
    }
    
    public function getLink_title() {
        return $this->_link_title;
    }

    public function getAnnonce() {
        return $this->_annonce;
    }

    public function getDate() {
        return date("d/m/Y H:i",$this->_date);
    }

    public function setId($id): void {
        $this->_id = $id;
    }

    public function setAdmin_id($admin_id): void {
        $this->_admin_id = $admin_id;
    }

    public function setTitle($title): void {
        $this->_title = $title;
    }

    public function setLink($link): void {
        $this->_link = $link;
    }
    
    public function setLink_title($link_title): void {
        $this->_link_title = $link_title;
    }
    
    public function setAnnonce($annonce): void {
        $this->_annonce = $annonce;
    }

    public function setDate($date): void {
        $this->_date = $date;
    }
    
    public function getAdminLogin() {
        global $db;
        
        $sql = "SELECT login FROM users WHERE id = $this->_admin_id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            $res = $req->fetch(PDO::FETCH_OBJ);
            return $res->login;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public function insert() {
        global $db;
        
        $sql = "INSERT INTO annonces (admin_id, titre, annonce, lien, titre_lien, date_insert) VALUES ($this->_admin_id, '$this->_title', '$this->_annonce', '$this->_link', '$this->_link_title', UNIX_TIMESTAMP(NOW()))";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public function delete() {
        global $db;
        
        $sql = "DELETE FROM annonces WHERE id = $this->_id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public static function getAnnonces() {
        global $db;
        
        $sql = "SELECT id FROM annonces ORDER BY date_insert DESC";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }

    public static function getLastsAcc() {
        global $db;

        $sql = "SELECT id FROM annonces ORDER BY date_insert DESC LIMIT 3";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
        
    }

}
