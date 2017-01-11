<?php
include 'connection.php';

$educ_type = $_POST['educ_type'];
$school_name = $_POST['school_name'];
$school_addr = $_POST['school_addr'];
$year_graduated = $_POST['year_graduated'];
$applicant_id = $_POST['applicant_id'];
$educ_id = $_POST['educ_id'];


$editEduc = 'UPDATE tbl_educ SET educ_type = :educ_type, school_name = :school_name, school_addr = :school_addr, year_graduated = :year_graduated, applicant_id = :applicant_id WHERE educ_id = :educ_id';
$editEducStmt = $dbh->prepare($editEduc);

$editEducStmt->bindParam(':educ_type', $educ_type, PDO::PARAM_STR);
$editEducStmt->bindParam(':school_name', $school_name, PDO::PARAM_STR);
$editEducStmt->bindParam(':school_addr', $school_addr, PDO::PARAM_STR);
$editEducStmt->bindParam(':year_graduated', $year_graduated, PDO::PARAM_STR);
$editEducStmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
$editEducStmt->bindParam(':educ_id', $educ_id, PDO::PARAM_INT);
$editEducStmt->execute();
?>