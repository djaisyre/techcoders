<?php
include 'connection.php';

$locators_name = $_POST['locators_name'];
$locators_address = $_POST['locators_address'];
$locators_contact = $_POST['locators_contact'];
$locators_uname = $_POST['locators_uname'];
$locators_upass = $_POST['locators_upass'];
$locators_id = $_POST['locators_id'];

$editLocators = 'UPDATE tbl_locators SET locators_name = :locators_name, locators_address = :locators_address, locators_contact = :locators_contact, locators_uname = :locators_uname, locators_upass = :locators_upass WHERE locators_id = :locators_id';
$editLocatorsStmt = $dbh->prepare($editLocators);
$editLocatorsStmt->bindParam(':locators_name', $locators_name, PDO::PARAM_STR);
$editLocatorsStmt->bindParam(':locators_address', $locators_address, PDO::PARAM_STR);
$editLocatorsStmt->bindParam(':locators_contact', $locators_contact, PDO::PARAM_STR);
$editLocatorsStmt->bindParam(':locators_uname', $locators_uname, PDO::PARAM_STR);
$editLocatorsStmt->bindParam(':locators_upass', $locators_upass, PDO::PARAM_STR);
$editLocatorsStmt->bindParam(':locators_id', $locators_id, PDO::PARAM_INT);
$editLocatorsStmt->execute();
?>