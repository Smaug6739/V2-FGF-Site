<?php
include "../models/db.php";

class Staff {
    
    private $_id;
    private $_pseudo;
    private $_mail;
    private $_majeur;
    private $_games;
    private $_q1;
    private $_q2;
    private $_q3;
    private $_q4;
    private $_q5;
    private $_q6;
    private $_statut;
    private $_date;
    
    function __construct($id = false) {
        if($id) {
            global $db;
            $sql = "SELECT pseudo, mail, majeur, jeux, q1, q2, q3, q4, q5, q6, statut, date_insert FROM staff WHERE id = $id";
            $req = $db->prepare($sql);
            
            if($req->execute()) {
                $res = $req->fetch(PDO::FETCH_OBJ);
                
                $this->_id = $id;
                $this->_pseudo = $res->pseudo;
                $this->_mail = $res->mail;
                $this->_majeur = $res->majeur;
                $this->_games = $res->jeux;
                $this->_q1 = $res->q1;
                $this->_q2 = $res->q2;
                $this->_q3 = $res->q3;
                $this->_q4 = $res->q4;
                $this->_q5 = $res->q5;
                $this->_q6 = $res->q6;
                $this->_statut = $res->statut;
                $this->_date = $res->date_insert;
            } else {
                error_log("SQL ERROR : $sql", 0);
            }
        }
    }
    public function getId() {
        return $this->_id;
    }

    public function getGames() {
        return $this->_games;
    }

    public function setId($id): void {
        $this->_id = $id;
    }

    public function setGames($games): void {
        $this->_games = $games;
    }

    public function getPseudo() {
        return $this->_pseudo;
    }

    public function getMail() {
        return $this->_mail;
    }
    
    public function getMajeur() {
        return $this->_majeur;
    }

    public function getQ1() {
        return $this->_q1;
    }

    public function getQ2() {
        return $this->_q2;
    }

    public function getQ3() {
        return $this->_q3;
    }

    public function getQ4() {
        return $this->_q4;
    }

    public function getQ5() {
        return $this->_q5;
    }

    public function getQ6() {
        return $this->_q6;
    }

    public function getStatut() {
        return $this->_statut;
    }

    public function getDate() {
        return date("d/m/Y H:i", $this->_date);
    }

    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    }

    public function setMail($mail) {
        $this->_mail = $mail;
    }
    
    public function setMajeur($majeur): void {
        $this->_majeur = $majeur;
    }

    public function setQ1($q1) {
        $this->_q1 = $q1;
    }

    public function setQ2($q2) {
        $this->_q2 = $q2;
    }

    public function setQ3($q3) {
        $this->_q3 = $q3;
    }

    public function setQ4($q4) {
        $this->_q4 = $q4;
    }

    public function setQ5($q5) {
        $this->_q5 = $q5;
    }

    public function setQ6($q6) {
        $this->_q6 = $q6;
    }

    public function setStatut($statut) {
        $this->_statut = $statut;
    }

    public function setDate($date) {
        $this->_date = $date;
    }
    
    public function insert() {
        global $db;
        
        $sql = "INSERT INTO staff(pseudo, mail, majeur, jeux, q1, q2, q3, q4, q5, q6, statut, date_insert)";
        $sql .= "VALUES ('$this->_pseudo', '$this->_mail', $this->_majeur, '$this->_games', '$this->_q1', '$this->_q2', '$this->_q3', '$this->_q4', '$this->_q5', '$this->_q6', $this->_statut, UNIX_TIMESTAMP(NOW()))";
        
        error_log("SQL DEBUG : $sql", 0);
        
        $req = $db->prepare($sql);
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }

    public function achieve() {
        global $db;
        
        $id = $this->_id;
        $sql = "UPDATE staff SET statut = 1 WHERE id = $id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public function delete() {
        global $db;
        
        $id = $this->_id;
        $sql = "DELETE FROM staff WHERE id = $id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public function getMajeurStr() {
        if($this->_majeur == 1) {
            return "Oui";
        }
        
        return "Non";
    }
    
    public static function getPending() {
        global $db;

        $sql = "SELECT id FROM staff WHERE statut = 0 ORDER BY date_insert ASC";
        $req = $db->prepare($sql);
        
        error_log("getPending", 0);

        if($req->execute()) {
            error_log("SQL DEBUG : $sql", 0);
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public static function getAchieved() {
        global $db;

        $sql = "SELECT id FROM staff WHERE statut = 1 ORDER BY date_insert ASC";
        $req = $db->prepare($sql);
        
        error_log("getPending", 0);

        if($req->execute()) {
            error_log("SQL DEBUG : $sql", 0);
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public static function getNbStaff() {
        global $db;

        $sql = "SELECT count(id) as nb FROM staff WHERE statut = 0";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetch(PDO::FETCH_OBJ);
            return $res->nb;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
}

