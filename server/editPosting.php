<?php
include 'connection.php';

$jobpost_title = $_POST['jobpost_title'];
$jobpost_description = $_POST['jobpost_description'];
$jobpost_numapp = $_POST['jobpost_numapp'];
$jobpost_date_closing = $_POST['jobpost_date_closing'];
$jobpost_status = $_POST['jobpost_status'];
$jobpost_id = $_POST['jobpost_id'];

$editJobpost = 'UPDATE tbl_jobpost SET jobpost_title = :jobpost_title, jobpost_description = :jobpost_description, jobpost_numapp = :jobpost_numapp, jobpost_date_closing = :jobpost_date_closing, jobpost_status = :jobpost_status WHERE jobpost_id = :jobpost_id';
$editJobpostStmt = $dbh->prepare($editJobpost);
$editJobpostStmt->bindParam(':jobpost_title', $jobpost_title, PDO::PARAM_STR);
$editJobpostStmt->bindParam(':jobpost_description', $jobpost_description, PDO::PARAM_STR);
$editJobpostStmt->bindParam(':jobpost_numapp', $jobpost_numapp, PDO::PARAM_STR);
$editJobpostStmt->bindParam(':jobpost_date_closing', $jobpost_date_closing, PDO::PARAM_STR);
$editJobpostStmt->bindParam(':jobpost_status', $jobpost_status, PDO::PARAM_INT);
$editJobpostStmt->bindParam(':jobpost_id', $jobpost_id, PDO::PARAM_INT);
$editJobpostStmt->execute();
?>