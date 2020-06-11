<?php

/* Database handler */

define('host', 'localhost');
define('user', 'root');
define('pass', '');
define('database', 'online-library');
define('port', '3308');

class Database {
    private $con = null;
    static $inst = null;

    public function __construct() {
        try {
            $this->con = new mysqli(host, user, pass, database, port);
        } catch (Exception $e) {
            die ('Unable to connect to the database.');
        }
    }

    public function __destruct() {
        if($this->con) {
            $this->con->close();
        }
    }

    static function getInstance() {
        if(self::$inst == null) {
            self::$inst = new Database();
        }
        return self::$inst;
    }
}
