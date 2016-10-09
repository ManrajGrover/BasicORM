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

        /**
         * Gets first name of contact
         * @return String First name of contact
         */
        public function getFirstName() {
            return $this->firstName;
        }

        /**
         * Sets first name of contact
         * @param String $_firstName First name to be set
         */
        public function setFirstName($_firstName) {
            $this->firstName = $_firstName;
        }

        /**
         * Gets last name of contact
         * @return String Last name of contact
         */
        public function getLastName() {
            return $this->lastName;
        }

        /**
         * Sets last name of contact
         * @param String $_lastName Last name to be set
         */
        public function setLastName($_lastName) {
            $this->lastName = $_lastName;
        }

        /**
         * Gets phone number of contact
         * @return String Phone number of contact
         */
        public function getPhoneNumber() {
            return $this->phoneNumber;
        }

        /**
         * Sets phone number of contact
         * @param String $_phoneNumber Phone number to be set
         */
        public function setPhoneNumber($_phoneNumber) {
            $this->firstName = $_phoneNumber;
        }
    }
?>
