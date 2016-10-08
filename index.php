<?php
    // require_once('Contact.php');
    // $contact = new Contact("Manraj", "Singh", "9811040427", "");
    // echo $contact->getFirstName();
    
    require_once('DbAccess.php');
    $dbAccess = new DbAccess("localhost", "8889", "root", "root", "contacts");

    $customers = $dbAccess->select("contact", array("first_name", "last_name"));
    var_dump($customers);
?>
