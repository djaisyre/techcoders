<?php
include 'connection.php';	

$educ_type = $_POST['educ_type'];
$school_name = $_POST['school_name'];
$school_addr = $_POST['school_addr'];
$year_graduated = $_POST['year_graduated'];
$applicant_id = $_POST['applicant_id'];


$saveEduc = 'INSERT INTO tbl_educ (educ_type, school_name, school_addr, year_graduated, applicant_id) VALUES 
(:educ_type, :school_name, :school_addr, :year_graduated, :applicant_id)';
$saveEducStmt = $dbh->prepare($saveEduc);
$saveEducStmt->bindParam(':educ_type', $educ_type, PDO::PARAM_STR);
$saveEducStmt->bindParam(':school_name', $school_name, PDO::PARAM_STR);
$saveEducStmt->bindParam(':school_addr', $school_addr, PDO::PARAM_STR);
$saveEducStmt->bindParam(':year_graduated', $year_graduated, PDO::PARAM_STR);
$saveEducStmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
$saveEducStmt->execute();

?>