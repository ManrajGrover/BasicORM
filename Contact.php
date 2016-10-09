<?php
    class Contact {
        private $firstName;
        private $lastName;
        private $phoneNumber;

        /**
         * Constructor of Contact
         * @param String $_firstName   First name of contact
         * @param String $_lastName    Last name of contact
         * @param String $_phoneNumber Phone number of contact
         */
        public function __construct($_firstName, $_lastName, $_phoneNumber) {
            $this->firstName = $_firstName;
            $this->lastName = $_lastName;
            $this->phoneNumber = $_phoneNumber;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function setFirstName($_firstName) {
            $this->firstName = $_firstName;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function setLastName($_lastName) {
            $this->lastName = $_lastName;
        }

        public function getPhoneNumber() {
            return $this->phoneNumber;
        }

        public function setPhoneNumber($_phoneNumber) {
            $this->firstName = $_phoneNumber;
        }
    }
?>
