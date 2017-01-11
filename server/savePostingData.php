<?php
include 'connection.php';

$jobpost_title = $_POST['jobpost_title'];
$jobpost_description = $_POST['jobpost_description'];
$jobpost_numapp = $_POST['jobpost_numapp'];
$jobpost_date_closing = $_POST['jobpost_date_closing'];
$locators_id = $_POST['locators_id'];

$saveJobpost = 'INSERT INTO tbl_jobpost (jobpost_title, jobpost_description, jobpost_numapp, jobpost_date_posted, jobpost_date_closing, locators_id) VALUES 
(:jobpost_title, :jobpost_description, :jobpost_numapp, CURDATE(), :jobpost_date_closing, :locators_id)';
$saveJobpostStmt = $dbh->prepare($saveJobpost);
$saveJobpostStmt->bindParam(':jobpost_title', $jobpost_title, PDO::PARAM_STR);
$saveJobpostStmt->bindParam(':jobpost_description', $jobpost_description, PDO::PARAM_STR);
$saveJobpostStmt->bindParam(':jobpost_numapp', $jobpost_numapp, PDO::PARAM_STR);
$saveJobpostStmt->bindParam(':jobpost_date_closing', $jobpost_date_closing, PDO::PARAM_STR);
$saveJobpostStmt->bindParam(':locators_id', $locators_id, PDO::PARAM_INT);
$saveJobpostStmt->execute();

$jobpostId = $dbh->lastInsertId(); 

foreach($_POST['skills'] as $category_id) {
	$qualifySet = 'INSERT INTO tbl_qualification (jobpost_id, category_id) VALUES (:jobpost_id, :category_id)';
	$qualifySetStmt = $dbh->prepare($qualifySet);
	$qualifySetStmt->bindParam(':jobpost_id', $jobpostId, PDO::PARAM_INT);
	$qualifySetStmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
	$qualifySetStmt->execute();
}
?>