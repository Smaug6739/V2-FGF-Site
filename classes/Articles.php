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
    private $_title;
    private $_content;
    private $_content_2;
    private $_category;
    private $_img;
    private $_img_2;
    private $_vid;
    private $_statut;
    private $_date;
    private $_auteur;

    function __construct($id = false) {

        if($id) {
            global $db;

            $sql = "SELECT user_id, title, content, content_2, categorie, lien, lien_2, lien_3, statut, date_insert, auteur FROM articles WHERE id = $id";
            $req = $db->prepare($sql);

            if($req->execute()) {

                $res = $req->fetch(PDO::FETCH_OBJ);

                $this->_id = $id;
                $this->_user_id = $res->user_id;
                $this->_title = $res->title;
                $this->_content = $res->content;
                $this->_content_2 = $res->content_2;
                $this->_category = $res->categorie;
                $this->_img = $res->lien;
                $this->_img_2 = $res->lien_2;
                $this->_vid = $res->lien_3;
                $this->_statut = $res->statut;
                $this->_date = $res->date_insert;
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

    function getTitle() {
        return $this->_title;
    }

    function getContent() {
        return $this->_content;
    }
    
    function getCategory() {
        return $this->_category;
    }
    function getAuteur() {
        return $this->_auteur;
    }
    function setUserId($userId) {
        $this->_user_id = $userId;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setContent($content) {
        $this->_content = $content;
    }

    function setCategory($category) {
        $this->_category = $category;
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
    public function getDate() {
        return date("d/m/Y H:i", $this->_date);
    }
    
    public function setDate($date) {
        $this->_date = $date;
    }
    
    public function getImg() {
        return $this->_img;
    }
   
    public function setImg($img): void {
        $this->_img = $img;
    }

    /**
     * @return mixed
     */
    public function getContent2()
    {
        return $this->_content_2;
    }

    /**
     * @param mixed $content_2
     * @return Articles
     */
    public function setContent2($content_2)
    {
        $this->_content_2 = $content_2;
    }

    /**
     * @return mixed
     */
    public function getImg2()
    {
        return $this->_img_2;
    }

    /**
     * @param mixed $img_2
     * @return Articles
     */
    public function setImg2($img_2)
    {
        $this->_img_2 = $img_2;
    }

    /**
     * @return mixed
     */
    public function getVid()
    {
        return $this->_vid;
    }

    /**
     * @param mixed $vid
     */
    public function setVid($vid): void
    {
        $this->_vid = $vid;
    }

    

        
    public function getCatStr() {
        switch ($this->_category) {
            case 1:
                return "Console";
                break;
            case 2:
                return "Jeux";
                break;
            case 3:
                return "Informatique";
                break;
            case 4:
                return "Musique";
                break;
            case 5:
                return "Partenaires";
                break;
            case 6:
                return "Divers";
                break;
        }
    }

    public function insert() {
        global $db;

        $sql = "INSERT INTO articles (user_id, title, content, content_2, categorie, lien, lien_2, lien_3, statut,  auteur) VALUES(:user_id, :title, :content, :content_2, :category, :img, :img_2, :vid, :statut,  :auteur)";
        $req = $db->prepare($sql);
        $req->bindValue( ':user_id', $this->_user_id, PDO::PARAM_STR );
        $req->bindValue( ':title', $this->_title, PDO::PARAM_STR );
        $req->bindValue( ':content', $this->_content, PDO::PARAM_STR );
        $req->bindValue( ':content_2', $this->_content_2, PDO::PARAM_STR );
        $req->bindValue( ':category', $this->_category, PDO::PARAM_INT );
        $req->bindValue( ':img', $this->_img, PDO::PARAM_STR );
        $req->bindValue( ':img_2', $this->_img_2, PDO::PARAM_STR );
        $req->bindValue( ':vid', $this->_vid, PDO::PARAM_STR );
        $req->bindValue( ':statut', $this->_statut, PDO::PARAM_INT );
        //$req->bindValue( ':date_insert', UNIX_TIMESTAMP(NOW()), PDO::PARAM_INT );
        $req->bindValue( ':auteur', $this->_auteur, PDO::PARAM_STR );

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
        $sql = "UPDATE articles SET statut = 1 WHERE id = $id";
        $req = $db->prepare($sql);
        
        if($req->execute()) {
            return true;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public function delete() {
        global $db;

        if(unlink("../redaction/imgs/".$this->_img)) {
            if(!empty($this->_img_2)) {
                unlink("../redaction/imgdeux/".$this->_img_2);
            }
            $id = $this->_id;
            $sql = "DELETE FROM articles WHERE id = $id";
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

        $sql = "SELECT id FROM articles WHERE statut = 0 ORDER BY date_insert ASC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
    }
    
    public static function getAchieved() {
        global $db;

        $sql = "SELECT id FROM articles WHERE statut = 1 ORDER BY date_insert DESC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
        
        
    }
    
    public static function getNbArticles() {
        global $db;

        $sql = "SELECT count(id) as nb FROM articles WHERE statut = 0";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetch(PDO::FETCH_OBJ);
            return $res->nb;
        }
        error_log("SQL ERROR : $sql", 0);
        return false;
    }
    
    public static function getLastsAcc() {
        global $db;

        $sql = "SELECT id FROM articles WHERE statut = 1 ORDER BY date_insert DESC LIMIT 6";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
        
    }
    
    public static function getLasts() {
        global $db;

        $sql = "SELECT id FROM articles WHERE statut = 1 ORDER BY date_insert DESC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
        
    }
    
    public static function getCat($cat) {
        global $db;

        $sql = "SELECT id FROM articles WHERE statut = 1 AND categorie = $cat ORDER BY date_insert DESC";
        $req = $db->prepare($sql);

        if($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        return false;
        
    }

    public function getEmbed() {
        if(strpos($this->_vid, "v=")) {
            $id = explode("v=", $this->_vid);

            if(strpos($id[1], "&list=")) {
                $justId = explode("&list=", $id[1]);
                $link = "https://www.youtube.com/embed/".$justId[0];
            } else {
                $link = "https://www.youtube.com/embed/".$id[1];
            }


        } else {
            $id = explode("youtu.be/", $this->_vid);
            $link = "https://www.youtube.com/embed/".$id[1];
        }

        return $link;
    }
}

