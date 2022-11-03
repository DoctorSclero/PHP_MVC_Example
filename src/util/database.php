<?php

    class Database {
        private static Database $instance;
        private $connection;

        private function __construct() {
            $host = "db";
            $user = "root";
            $password = "";
            $db_name = "school";
        
            $this->db = new mysqli($host, $user, $password);
            $this->db->select_db($db_name);
        }
        
        public static function getConnection() {
            if (!isset(Database::$instance)) {
                Database::$instance = new Database();
            }
            return Database::$instance->connection;
        }
    }
    
?>