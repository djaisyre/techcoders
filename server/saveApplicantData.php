<?php
include 'connection.php';	

$applicant_lname = $_POST['applicant_lname'];
$applicant_fname = $_POST['applicant_fname'];
$applicant_mname = $_POST['applicant_mname'];
$applicant_gender = $_POST['applicant_gender'];
$applicant_cstatus = $_POST['applicant_cstatus'];
$applicant_address = $_POST['applicant_address'];
$applicant_city = $_POST['applicant_city'];
$applicant_province = $_POST['applicant_province'];
$applicant_postal = $_POST['applicant_postal'];
$applicant_contact = $_POST['applicant_contact'];
$applicant_age = $_POST['applicant_age'];
$applicant_email = $_POST['applicant_email'];
$applicant_dob = $_POST['applicant_dob'];
$applicant_pob = $_POST['applicant_pob'];
$applicant_username = $_POST['applicant_username'];
$applicant_password = $_POST['applicant_password'];
$applicant_confirmpass = $_POST['applicant_confirmpass'];



$saveApplicant = 'INSERT INTO tbl_applicant (applicant_lname, applicant_fname, applicant_mname, applicant_gender, applicant_cstatus, applicant_address, applicant_city, applicant_province, applicant_postal, applicant_contact, applicant_age, applicant_email, applicant_dob, applicant_pob, applicant_username, applicant_password, applicant_confirmpass) VALUES 
(:applicant_lname, :applicant_fname, :applicant_mname, :applicant_gender, :applicant_cstatus, :applicant_address, :applicant_city, :applicant_province, :applicant_postal, :applicant_contact, :applicant_age, :applicant_email, :applicant_dob, :applicant_pob, :applicant_username, :applicant_password, :applicant_confirmpass)';
$saveApplicantStmt = $dbh->prepare($saveApplicant);
$saveApplicantStmt->bindParam(':applicant_lname', $applicant_lname, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_fname', $applicant_fname, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_mname', $applicant_mname, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_gender', $applicant_gender, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_cstatus', $applicant_cstatus, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_address', $applicant_address, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_city', $applicant_city, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_province', $applicant_province, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_postal', $applicant_postal, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_contact', $applicant_contact, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_age', $applicant_age, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_email', $applicant_email, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_dob', $applicant_dob, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_pob', $applicant_pob, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_username', $applicant_username, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_password', $applicant_password, PDO::PARAM_STR);
$saveApplicantStmt->bindParam(':applicant_confirmpass', $applicant_confirmpass, PDO::PARAM_STR);
$saveApplicantStmt->execute();

$applicantId = $dbh->lastInsertId(); 

foreach($_POST['skills'] as $category_id) {
	$skillSet = 'INSERT INTO tbl_skills (applicant_id, category_id) VALUES (:applicant_id, :category_id)';
	$skillSetStmt = $dbh->prepare($skillSet);
	$skillSetStmt->bindParam(':applicant_id', $applicantId, PDO::PARAM_INT);
	$skillSetStmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
	$skillSetStmt->execute();
}
?>