<?php
    require_once('ContactDao.php');
    require_once('Contact.php');

    function printContacts($contacts) {
        foreach($contacts as $contact) {
            echo $contact->getFirstName()." ". $contact->getLastName()." ".$contact->getPhoneNumber()."\n";
        }
    }

    $dao = new ContactDao("localhost", "8889", "root", "root", "contacts");

    echo "Contacts with First Name Ram are: \n";
    $contacts = $dao->findByFirstName("Ram");
    printContacts($contacts);

    echo "Contacts with Last Name Singh are: \n";
    $contacts = $dao->findByLastName("Singh");
    printContacts($contacts);

    echo "Contacts with Phone Number 8765434343 are: \n";
    $contacts = $dao->findByPhoneNumber("8765434343");
    printContacts($contacts);
?>
