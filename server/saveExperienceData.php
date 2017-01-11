<?php
	include("connection.php");

		$jobex_title = $_POST['jobex_title'];
		$jobex_company = $_POST['jobex_company'];
		$jobex_started = $_POST['jobex_started'];
		$jobex_end = $_POST['jobex_end'];
		$applicant_id = $_POST['applicant_id'];
		
		
$saveJobexp = 'INSERT INTO tbl_job_exp (jobex_title, jobex_company, jobex_started, jobex_end, applicant_id) VALUES 
(:jobex_title, :jobex_company, :jobex_started, :jobex_end, :applicant_id)';

$saveJobexpStmt = $dbh->prepare($saveJobexp);
$saveJobexpStmt->bindParam(':jobex_title', $jobex_title, PDO::PARAM_STR);
$saveJobexpStmt->bindParam(':jobex_company', $jobex_company, PDO::PARAM_STR);
$saveJobexpStmt->bindParam(':jobex_started', $jobex_started, PDO::PARAM_STR);
$saveJobexpStmt->bindParam(':jobex_end', $jobex_end, PDO::PARAM_STR);
$saveJobexpStmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
$saveJobexpStmt->execute();


		
?>