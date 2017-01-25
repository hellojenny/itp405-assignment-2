<?php

class Database {
    private $host = 'itp460.usc.edu';
    private $database_name = 'dvd';
    private $username = 'student';
    private $password = 'ttrojan';
    protected static $pdo; // static property (must use "self::$pdo)

    public function __construct() {
        if (!self::$pdo) {
            echo 'db connection created';
            // create new PDO connection to MySQL database
            $connection_string = "mysql:host=$this->host;dbname=$this->database_name";
            self::$pdo = new PDO($connection_string, $this->username, $this->password);
        }
    }
}