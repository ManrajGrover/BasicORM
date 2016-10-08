<?php
    require_once('DbAccess.php');

    class ORM {

        public function __construct($_dbHost, $_port, $_username, $_password, $_dbName) {
            $this->db = new DbAccess($_dbHost, $_port, $_username, $_password, $_dbName);
            $this->connection = $this->db->connect();
        }

        public function findByFirstName($_firstName) {
            if(!is_string($_firstName) || empty($_firstName)) {
                throw new Error
            }
            $results = $dbAccess->select("contact", array("first_name", "last_name"));
        }

    }
?>
