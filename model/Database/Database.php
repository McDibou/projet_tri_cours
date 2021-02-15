<?php

namespace Adrien\Database;
use \PDO;

class Database
{
    private $db_host;
    private $db_name;
    private $db_port;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct($db_host, $db_name, $db_port, $db_user, $db_pass)
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_port = $db_port;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    protected function getPDO()
    {
        if (is_null($this->pdo)) {
            $pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';port=' . $this->db_port . '', '' . $this->db_user . '', '' . $this->db_pass . '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $one = false)
    {
        $req = $this->getPDO()->query($statement);

        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $req;
        }

        $req->setFetchMode(PDO::FETCH_OBJ);

        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }

        return $data;
    }

    public function prepare($statement, $attribute, $one = false)
    {

        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attribute);

        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }

        $req->setFetchMode(PDO::FETCH_OBJ);

        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }

        return $data;
    }

    public function count($statement, $attribute = null)
    {

        if ($attribute) {
            $req = $this->getPDO()->prepare($statement);
            $req->execute($attribute);
        } else {
            $req = $this->getPDO()->query($statement);
        }
        return $req->rowCount();

    }

    public function lastId()
    {
        return $this->getPDO()->lastInsertId();
    }
}