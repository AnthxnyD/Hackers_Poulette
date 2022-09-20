<?php
class Query {
    private $db;
    public function __construct($dbName, $host = "localhost", $user = 'root', $pswd = '') {
        try
        {
            // On se connecte à MySQL
            $this->db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $pswd);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    public function fetchAllQuery($query) {
        $req = $this->db->prepare($query);
        $req->execute();
        $res = $req->fetchAll();
        $req = null;
        return $res;
    }
    public function fetchAssocQuery($query) {
        $req = $this->db->prepare($query);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $req = null;
        return $res;
    }
    public function executeQuery($query, $exec = null) {
        $req = $this->db->prepare($query);
        $req->execute($exec) or die(print_r($this->db->errorInfo()));
        $req = null;
    }
}