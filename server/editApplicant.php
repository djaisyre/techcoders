<?php
include 'connection.php';

$applicant_lname = $_POST['applicant_lname'];
$applicant_fname = $_POST['applicant_fname'];
$applicant_gender = $_POST['applicant_gender'];
$applicant_cstatus = $_POST['applicant_cstatus'];
$applicant_address = $_POST['applicant_address'];
$applicant_city = $_POST['applicant_city'];
$applicant_province = $_POST['applicant_province'];
$applicant_postal = $_POST['applicant_postal'];
$applicant_contact = $_POST['applicant_contact'];
$applicant_age = $_POST['applicant_age'];
$applicant_email = $_POST['applicant_email'];
$applicant_username = $_POST['applicant_username'];
$applicant_password = $_POST['applicant_password'];
$applicant_id = $_POST['applicant_id'];

$editApplicant = 'UPDATE tbl_applicant SET applicant_lname = :applicant_lname, applicant_fname = :applicant_fname, applicant_gender = :applicant_gender, applicant_cstatus = :applicant_cstatus, applicant_address = :applicant_address, applicant_city = :applicant_city, applicant_province= :applicant_province, applicant_postal = :applicant_postal, applicant_contact = :applicant_contact, applicant_age = :applicant_age, applicant_email = :applicant_email, applicant_username = :applicant_username, applicant_password = :applicant_password WHERE applicant_id = :applicant_id';
$editApplicantStmt = $dbh->prepare($editApplicant);
$editApplicantStmt->bindParam(':applicant_lname', $applicant_lname, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_fname', $applicant_fname, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_gender', $applicant_gender, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_cstatus', $applicant_cstatus, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_address', $applicant_address, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_city', $applicant_city, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_province', $applicant_province, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_postal', $applicant_postal, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_contact', $applicant_contact, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_age', $applicant_age, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_email', $applicant_email, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_username', $applicant_username, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_password', $applicant_password, PDO::PARAM_STR);
$editApplicantStmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
$editApplicantStmt->execute();


?>