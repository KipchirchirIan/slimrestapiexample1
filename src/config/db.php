<?php
/**
 * Created by PhpStorm.
 * Author: Ian Kipchirchir
 * Date: 4/18/20
 * Time: 6:26 AM
 *
 * Connect to MySQL using the PDO class
 */

class Db {
    private $dbhost = DB_HOST;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;
    private $dbname = DB_NAME;

    public function connect()
    {
        $prepare_conn_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
        $dbConn = new PDO($prepare_conn_str, $this->dbuser, $this->dbpass);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//        return the database connection back
        return $dbConn;
    }
}