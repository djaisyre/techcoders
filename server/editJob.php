<?php
include 'connection.php';

$jobex_title = $_POST['jobex_title'];
$jobex_company = $_POST['jobex_company'];
$jobex_started = $_POST['jobex_started'];
$jobex_end = $_POST['jobex_end'];
$applicant_id = $_POST['applicant_id'];
$jobex_id = $_POST['jobex_id'];
		


$editJob = 'UPDATE tbl_job_exp SET jobex_title = :jobex_title, jobex_company = :jobex_company, jobex_started = :jobex_started, jobex_end = :jobex_end, applicant_id = :applicant_id WHERE jobex_id = :jobex_id';
$editJobStmt = $dbh->prepare($editJob);

$editJobStmt->bindParam(':jobex_title', $jobex_title, PDO::PARAM_STR);
$editJobStmt->bindParam(':jobex_company', $jobex_company, PDO::PARAM_STR);
$editJobStmt->bindParam(':jobex_started', $jobex_started, PDO::PARAM_STR);
$editJobStmt->bindParam(':jobex_end', $jobex_end, PDO::PARAM_STR);
$editJobStmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
$editJobStmt->bindParam(':jobex_id', $jobex_id, PDO::PARAM_INT);
$editJobStmt->execute();
?>