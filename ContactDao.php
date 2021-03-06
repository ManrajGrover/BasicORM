<?php
    /**
     * Require DbAccess
     */
    require_once('ORM.php');

    class ContactDao {

        /**
         * Constructor for ORM, creates instance of DbAccess and stores the connection
         * @param String $_dbHost   Database Host
         * @param String $_port     Port Number
         * @param String $_username User's username of database
         * @param String $_password User's password for user of database
         * @param String $_dbName   Database name
         */
        public function __construct($_dbHost, $_port, $_username, $_password, $_dbName) {
            $this->db = new ORM($_dbHost, $_port, $_username, $_password, $_dbName);
            $this->connection = $this->db->connect();
        }

        /**
         * Generates objects from results of query
         * @param  Array $contacts  Query result whose objects need to be generated
         * @return Array            Array of Objects 
         */
        private function getObjects($contacts) {
            $results = array();

            foreach($contacts as $contact) {
                $results[] = new Contact($contact["first_name"], $contact["last_name"], $contact["phone_number"]);
            }

            return $results;
        }

        /**
         * Finds contacts by their first name
         * @param  String $_firstName First name to be searched
         * @return Array              Array of Objects of contacts with given first name
         */
        public function findByFirstName($_firstName) {
            if(!is_string($_firstName) || empty($_firstName)) {
                throw new Error("Invalid parameters passed");
            }

            $fields = array("first_name", "last_name", "phone_number");
            $filters = array("first_name" => $_firstName);
            $results = $this->db->select("contact", $fields, $filters);

            return $this->getObjects($results);
        }

        /**
         * Finds contacts by their last name
         * @param  String $_lastName  Last name to be searched
         * @return Array              Array of Objects of contacts with given last name
         */
        public function findByLastName($_lastName) {
            if(!is_string($_lastName) || empty($_lastName)) {
                throw new Error("Invalid parameters passed");
            }

            $fields = array("first_name", "last_name", "phone_number");
            $filters = array("last_name" => $_lastName);
            $results = $this->db->select("contact", $fields, $filters);

            return $this->getObjects($results);
        }

        /**
         * Finds contacts by their phone number
         * @param  String $_phoneNumber Phone number to be searched
         * @return Array                Array of Objects of contacts with given phone number
         */
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
