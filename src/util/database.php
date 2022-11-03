<?php

    class Database {
        private static Database $instance;
        private $db;

        private function __construct() {
            $host = "db";
            $user = "root";
            $password = "";
            $db_name = "school";
        
            $this->db = new mysqli($host, $user, $password);
            $this->db->select_db($db_name);
        }
        
        private function _getDatabase() {
            return $this->db;
        }
        
        public static function getDatabase() {
            if (!isset(Database::$instance)) {
                Database::$instance = new Database();
            }
            return Database::$instance->_getDatabase();
        }
    }
    
?>