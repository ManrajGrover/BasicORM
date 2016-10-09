<?php
    class DbAccess {
        private $dbHost;
        private $username;
        private $password;
        private $port;
        private $dbName;

        private $conn;

        /**
         * Constructor for DbAccess
         * @param String $_dbHost   Database Host
         * @param String $_port     Port number
         * @param String $_username User's username
         * @param String $_password User's password
         * @param String $_dbName   Database Name
         */
        public function __construct($_dbHost, $_port, $_username, $_password, $_dbName) {
            $this->dbHost = $_dbHost;
            $this->port = $_port;
            $this->username = $_username;
            $this->password = $_password;
            $this->dbName = $_dbName;
        }

        /**
         * Connect to database
         * @return Object Connection object
         */
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

        /**
         * Executes the query and returns the fetched rows
         * @param  Object $_query Prepared query to be executed
         * @param  String $params Parameters to be used in prepared query
         * @return Array          Array of rows fetched from database
         */
        public function query($_query, $params) {
            $db_connect = $this->connect();
            $_query->execute($params);

            return $_query->fetchAll();
        }

        /**
         * Generates dynamic query based on fields and filters
         * @param  String       $_table  Table name
         * @param  Array/String $_fields Fields to be fetched, defaults to all
         * @param  Array        $_where  Array of filters
         * @return Array                 Array of rows fetched from database
         */
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
            
            return $this->query($query, $_where);
        }
    }
?>
