<?php
include 'connection.php';

/*
if(val.application_status == 0) {
	appStat = 'Pending';
} else if(val.application_status == 1) {
	appStat = 'Short List';
} else if(val.application_status == 2) {
	appStat = 'Skills Inventory';
} else if(val.application_status == 3) {
	appStat = 'Hired';
}
*/

$jpost_id = $_POST['jpost_id'];
$setTo = 2;
$reset = 'UPDATE tbl_application SET application_status = :application_status WHERE application_status NOT IN (3) AND jobpost_id = :jobpost_id';
$resetApplicantStmt = $dbh->prepare($reset);
$resetApplicantStmt->bindParam(':application_status', $setTo, PDO::PARAM_INT);
$resetApplicantStmt->bindParam(':jobpost_id', $jpost_id, PDO::PARAM_INT);
$resetApplicantStmt->execute();

foreach($_POST['hired'] as $application_id) {
	$app_stat = 1;
	$hired = 'UPDATE tbl_application SET application_status = :application_status WHERE application_id = :application_id';
	$hiredApplicantStmt = $dbh->prepare($hired);
	$hiredApplicantStmt->bindParam(':application_status', $app_stat, PDO::PARAM_INT);
	$hiredApplicantStmt->bindParam(':application_id', $application_id, PDO::PARAM_INT);
	$hiredApplicantStmt->execute();
}
?>