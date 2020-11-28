<?php
// fw/database.php
class database  { 

    private $connection= false;
    private $response;
    private static $instance = false;


    private function __construct(){}

    public static function getInstance(){
            if(!self::$instance) self::$instance = new database();
            return self::$instance;
        }
    

    private function connect(){
        $this->connection = mysqli_connect("localhost", "root", "", "rythymbase");
    }

    public function query($q){
        if(!$this->connection) $this->connect();
        $this->response = mysqli_query($this->connection, $q);
        return $q;
        if (!$this->response) die(mysqli_error($this->connection) . " -- Consulta: " . $q);
    }

    public function fetch(){
        return mysqli_fetch_assoc($this->response);
    }


    public function fetchAll(){
        $aux = array();
        while ($row = $this->fetch()) $aux[] = $row;
        return $aux;
    }

    public function escape($str) {
        if(!$this->connection) $this->connect();
        return mysqli_escape_string($this->connection, $str);
    }

    public function escapeWildcards($str) {
        $aux = str_replace('%', '\%', $str);
        $aux = str_replace('_', '\_', $str);
        return $str;
    }

    public function numRows(){
        return mysqli_num_rows($this->response);
    }

    
}
