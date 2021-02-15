<?php

namespace Adrien;

use Adrien\Auth\Auth;
use Adrien\Database\Database;
use Adrien\Table\Table;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'config.php';

class App
{
    private $db_instance;
    private static $_instance;

    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getDatabase()
    {
        if (empty($this->db_instance)) {
            $this->db_instance = new Database(DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS);
        }
        return $this->db_instance;
    }

    public function getTable($name)
    {
        return new Table($this->getDatabase(), $name);
    }

    public function getAuth()
    {
        return new Auth();
    }
}