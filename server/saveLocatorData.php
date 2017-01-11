<?php
include 'connection.php';
	
$locators_name = $_POST['locators_name'];
$locators_address = $_POST['locators_address'];
$locators_contact = $_POST['locators_contact'];
$locators_uname = $_POST['locators_uname'];
$locators_upass = $_POST['locators_upass'];

$saveLocators = 'INSERT INTO tbl_locators (locators_name, locators_address, locators_contact, locators_uname, locators_upass) VALUES 
(:locators_name, :locators_address, :locators_contact, :locators_uname, :locators_upass)';
$saveLocatorsStmt = $dbh->prepare($saveLocators);
$saveLocatorsStmt->bindParam(':locators_name', $locators_name, PDO::PARAM_STR);
$saveLocatorsStmt->bindParam(':locators_address', $locators_address, PDO::PARAM_STR);
$saveLocatorsStmt->bindParam(':locators_contact', $locators_contact, PDO::PARAM_STR);
$saveLocatorsStmt->bindParam(':locators_uname', $locators_uname, PDO::PARAM_STR);
$saveLocatorsStmt->bindParam(':locators_upass', $locators_upass, PDO::PARAM_STR);
$saveLocatorsStmt->execute();

?>