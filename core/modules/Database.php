<?php

namespace App\Models;

class Database {

    protected $db;
    private $host = 'localhost';
    private $db_name = 'history';
    private $username = 'root';
    private $password = '';

    public function __construct() 
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=utf8mb4";
            $this->db = new PDO($dsn, $this->username, $this->password);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setData($num1, $num2, $operator, $result) 
    {
        $sql = "INSERT INTO history (num1, num2, operator, result) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$num1, $num2, $operator, $result]);
    }

     public function getData()
    {
        $stmt = $this->db->query("SELECT * FROM history");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
