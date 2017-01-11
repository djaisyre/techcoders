<?php
include 'connection.php';

// 0 = pending, 1 = short, 2 = skill
$jobpost_id = $_GET['jobpost_id'];
$applicant_id = $_GET['applicant_id'];

$saveApplication = 'INSERT INTO tbl_application (application_date, jobpost_id, applicant_id) VALUES 
(CURDATE(), :jobpost_id, :applicant_id)';
$saveApplicationStmt = $dbh->prepare($saveApplication);
$saveApplicationStmt->bindParam(':jobpost_id', $jobpost_id, PDO::PARAM_INT);
$saveApplicationStmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
$saveApplicationStmt->execute();
?>