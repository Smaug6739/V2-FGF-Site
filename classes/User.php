<?php

if(file_exists("../models/db.php")) {
    include "../models/db.php";
} else {
    include "models/db.php";
}


/**
 *
 */
class User {

    private $_id;
    private $_discord_id;
    private $_mail;
    private $_login;
    private $_pass;
    private $_logged = false;
    private $_admin = false;
    private $_super_admin = false;

    function __construct($login = false, $pass = false) {
        
        if($login !== false && $pass !== false) {
            
            global $db;

            $sql = "SELECT id, discord_id, login, pass, admin, super_admin FROM users WHERE login = '$login'";
            $req = $db->prepare($sql);

            if($req->execute()) {

                $res = $req->fetch(PDO::FETCH_OBJ);
                $this->_id = $res->id;
                $this->_discord_id = $res->discord_id;
                $this->_login = $res->login;
                $this->_pass = $pass;
                $this->_admin = $res->admin;
                $this->_super_admin = $res->super_admin;

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
    
    public function getDiscord_id() {
        return $this->_discord_id;
    }

    public function setDiscord_id($discordId): void {
        $this->_discord_id = $discordId;
    }

        
    public function getMail() {
        return $this->_mail;
    }

    public function setMail($mail) {
        $this->_mail = $mail;
    }

    public function getLogin() {
        return $this->_login;
    }

    public function setLogin($login) {
        $this->_login = $login;
    }

    public function getPass() {
        return $this->_pass;
    }

    public function setPass($pass) {
        $this->_pass = $pass;
    }

    public function getLogged() {
        return $this->_logged;
    }

    public function setLogged($logged) {
        $this->_logged = $logged;
    }
    
    public function getAdmin() {
        return $this->_admin;
    }

    public function setAdmin($admin) {
        $this->_admin = $admin;
    }
    
    public function getSuperAdmin() {
        return $this->_super_admin;
    }

    public function setSuperAdmin($super) {
        $this->_super_admin = $super;
    }
    
    public function userSubscribe() {
        global $db;
        
        $mail = $this->_mail;
        $login = $this->_login;
        $pass = $this->_pass;
        
        $sql = "INSERT INTO users (discord_id, login, pass, mail, admin, date_insert) VALUES ('0', '$login', '$pass', '$mail', 0, UNIX_TIMESTAMP(NOW()))";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public function discordSubscribe() {
        global $db;
        
        //error_log("------------------- discordSubscribe -------------------", 0);
        
        $discordId = $this->_discord_id;
        $mail = $this->_mail;
        $login = $this->_login;
        
        $sql = "INSERT INTO users (discord_id, login, mail, admin, date_insert) VALUES ('$discordId', '$login', '$mail', 0, UNIX_TIMESTAMP(NOW()))";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            //error_log("SQL DEBUG : $sql", 0);
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }

    public function verifyPass() {
        global $db;

        $login = $this->_login;

        $sql = "SELECT pass FROM users WHERE login = '$login'";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetch(PDO::FETCH_OBJ);
            if(password_verify($this->_pass, $res->pass)) {
                return true;
            }
            return false;
        } else {
            error_log("SQL ERROR : $sql", 0);
        }

    }
    
    public function verifyDiscord() {
        global $db;
        
        //error_log("------------------- verifyDiscord -------------------", 0);

        $sql = "SELECT discord_id FROM users WHERE login = '$this->_login' AND discord_id = '$this->_discord_id'";
        $req = $db->prepare($sql);

        if($req->execute()) {
            error_log("SQL DEBUG : $sql", 0);
            if($req->rowCount() == 0) {
                error_log("rowcount 0", 0);
                return true;
            }
            
        } else {
            error_log("SQL ERROR : $sql", 0);
        }
        
        return false;

    }
    
    public static function getUsers() {
        global $db;

        $sql = "SELECT id, discord_id, login, pass, mail, date_insert FROM users WHERE admin = 0 ORDER BY date_insert ASC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
    }
    
    public static function getAdmins() {
        global $db;

        $sql = "SELECT id, login, pass, mail, super_admin, date_insert FROM users WHERE admin = 1 ORDER BY date_insert ASC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
    }
    
    public static function deleteUser($id) {
        global $db;

        $sql = "DELETE FROM users WHERE id = $id";
        $req = $db->prepare($sql);

        if($req->execute()) {
            
            return true;
        }
        return false;
    }
    
    public static function create($pseudo, $hash) {
        global $db;
        
        $sql = "INSERT INTO users (login, pass, admin, super_admin) VALUES('$pseudo', '$hash', 1, 0)";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public static function update($id, $pseudo, $hash) {
        global $db;
        
        $sql = "UPDATE users SET login = '$pseudo', pass = '$hash' WHERE id = $id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public static function loginExists($login) {
        global $db;
        
        $sql = "SELECT id FROM users WHERE login = '$login'";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            
            $nb = $req->rowCount();
            
            if($nb == 0) {
                return false;
            }
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public static function mailExists($mail) {
        global $db;
        
        $sql = "SELECT id FROM users WHERE mail = '$mail'";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            
            $nb = $req->rowCount();
            
            if($nb == 0) {
                return false;
            }
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public static function getLoginById($id) {
        global $db;
        
        $sql = "SELECT login FROM users WHERE id = $id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            
            $res = $req->fetch(PDO::FETCH_OBJ);
            return $res->login;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
}
