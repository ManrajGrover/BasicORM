<?php
    class Contacts {
        private $firstName;
        private $lastName;
        private $phoneNumber;

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
