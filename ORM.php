<?php
    require_once('DbAccess.php');

    class ORM {

        public function __construct($_dbHost, $_port, $_username, $_password, $_dbName) {
            $this->db = new DbAccess($_dbHost, $_port, $_username, $_password, $_dbName);
            $this->connection = $this->db->connect();
        }

        public function findByFirstName($_firstName) {
            if(!is_string($_firstName) || empty($_firstName)) {
                throw new Error("Invalid parameters passed");
            }

            $fields = array("first_name", "last_name", "phone_number");
            $filters = array("first_name" => $_firstName);
            $results = $this->db->select("contact", $fields, $filters);

            $contacts = array();

            foreach($results as $row) {
                $contacts[] = new Contact($row["first_name"], $row["last_name"], $row["phone_number"]);
            }

            return $contacts;
        }

        public function findByLastName($_lastName) {
            if(!is_string($_lastName) || empty($_lastName)) {
                throw new Error("Invalid parameters passed");
            }

            $fields = array("first_name", "last_name", "phone_number");
            $filters = array("last_name" => $_lastName);
            $results = $this->db->select("contact", $fields, $filters);

            $contacts = array();

            foreach($results as $row) {
                $contacts[] = new Contact($row["first_name"], $row["last_name"], $row["phone_number"]);
            }

            return $contacts;
        }

        public function findByPhoneNumber($_phoneNumber) {
            if(!is_string($_phoneNumber) || empty($_phoneNumber)) {
                throw new Error("Invalid parameters passed");
            }

            $fields = array("first_name", "last_name", "phone_number");
            $filters = array("phone_number" => $_phoneNumber);
            $results = $this->db->select("contact", $fields, $filters);

            $contacts = array();

            foreach($results as $row) {
                $contacts[] = new Contact($row["first_name"], $row["last_name"], $row["phone_number"]);
            }

            return $contacts;
        }

    }
?>
