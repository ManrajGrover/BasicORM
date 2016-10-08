<?php
    class DbAccess {
        private $dbHost;
        private $username;
        private $password;
        private $port;
        private $dbName;

        private $conn;

        public function __construct($_dbHost, $_port, $_username, $_password, $_dbName) {
            $this->dbHost = $_dbHost;
            $this->port = $_port;
            $this->username = $_username;
            $this->password = $_password;
            $this->dbName = $_dbName;
        }

        public function connect() {
            if ($this->conn === null) {
                $options = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );
                $this->conn = new PDO("mysql:host=$this->dbHost:$this->port;dbname=$this->dbName", $this->username, $this->password, $options);
            }
            return $this->conn;
        }

        public function query($_query, $params) {
            $db_connect = $this->connect();
            $_query->execute($params);
            $result = $_query->fetchAll();

            return $result;
        }

        public function select($_table, $_fields = '*', $_where = array()) {
            $db_connect = $this->connect();

            if(is_array($_fields)) {
                $_fields = implode(',', $_fields);
            }
            $filters = array();
            if (count($_where) === 0 ) {
                $prepare_query = "SELECT $_fields FROM $_table";
            }
            else {

                foreach ($_where as $key => $value) {
                    $filters[] = $key.' = :'.$key;
                }

                $prepare_query = "SELECT $_fields FROM $_table WHERE ".implode(" AND ", $filters);
            }
            
            $query = $db_connect->prepare($prepare_query);
            $results = $this->query($query, $_where);
            
            return $results;
        }
    }
?>
