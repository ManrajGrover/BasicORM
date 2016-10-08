<?php
    require_once('DbAccess.php');

    class ORM {

        public function __construct($_dbHost, $_port, $_username, $_password, $_dbName) {
            $this->db = new DbAccess($_dbHost, $_port, $_username, $_password, $_dbName);
            $this->connection = $this->db->connect();
        }

        private function getObjects($contacts) {
            $results = array();

            foreach($contacts as $contact) {
                $results[] = new Contact($contact["first_name"], $contact["last_name"], $contact["phone_number"]);
            }

            return $results;
        }

        public function findByFirstName($_firstName) {
            if(!is_string($_firstName) || empty($_firstName)) {
                throw new Error("Invalid parameters passed");
            }

            $fields = array("first_name", "last_name", "phone_number");
            $filters = array("first_name" => $_firstName);
            $results = $this->db->select("contact", $fields, $filters);

            return $this->getObjects($results);
        }

        public function findByLastName($_lastName) {
            if(!is_string($_lastName) || empty($_lastName)) {
                throw new Error("Invalid parameters passed");
            }

            $fields = array("first_name", "last_name", "phone_number");
            $filters = array("last_name" => $_lastName);
            $results = $this->db->select("contact", $fields, $filters);

            return $this->getObjects($results);
        }

        public function findByPhoneNumber($_phoneNumber) {
            if(!is_string($_phoneNumber) || empty($_phoneNumber)) {
                throw new Error("Invalid parameters passed");
            }

            $fields = array("first_name", "last_name", "phone_number");
            $filters = array("phone_number" => $_phoneNumber);
            $results = $this->db->select("contact", $fields, $filters);

            return $this->getObjects($results);
        }

    }
?>
