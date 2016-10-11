<?php
    require_once('ORM.php');
    require_once('Contact.php');

    function printContacts($contacts) {
        foreach($contacts as $contact) {
            echo $contact->getFirstName()." ". $contact->getLastName()." ".$contact->getPhoneNumber()."\n";
        }
    }

    $orm = new ORM("localhost", "8889", "root", "root", "contacts");

    echo "Contacts with First Name Ram are: \n";
    $contacts = $orm->findByFirstName("Ram");
    printContacts($contacts);

    echo "Contacts with Last Name Singh are: \n";
    $contacts = $orm->findByLastName("Singh");
    printContacts($contacts);

    echo "Contacts with Phone Number 8765434343 are: \n";
    $contacts = $orm->findByPhoneNumber("8765434343");
    printContacts($contacts);
?>
