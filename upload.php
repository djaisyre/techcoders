<?php
header("Access-Control-Allow-Origin:*");
include("connection.php");

//if(isset($_FILES['profileImg']['tmp_name']))
//{
//	$profileImg = addslashes($_FILES['profileImg']['tmp_name']);
//	$profileImg = file_get_contents($profileImg);
//	$profileImg = base64_encode($profileImg);
//}

//if(isset($_FILES['attachImg']['tmp_name']))
//{
//	$attachImg = addslashes($_FILES['attachImg']['tmp_name']);
//	$attachImg = file_get_contents($attachImg);
//	$attachImg = base64_encode($attachImg);	
//}

$imgData = $_POST["imgdata"];
$appid = $_POST["applicant_id"];
//$insertFile = 'INSERT INTO tbl_upload (primary_file, secondary_file) VALUES (:primary_file, :secondary_file)';
//$insertFile = 'INSERT INTO tbl_upload (primary_file) VALUES (:primary_file)';
//$insertFileStmt = $con->prepare($insertFile);
//$insertFileStmt->bindParam(':primary_file', $imgData, PDO::PARAM_STR);
//$insertFileStmt->bindParam(':secondary_file', $attachImg, PDO::PARAM_STR);
//$insertFileStmt->execute();
//$home = $dbh->prepare("UPDATE tbl_applicant SET primary_file = :primary_file WHERE applicant_id = :applicant_id)");
$home = $dbh->prepare("INSERT INTO tbl_upload (primary_file, applicant_id) VALUES (:primary_file, :applicant_id)");
	$home->bindParam(":primary_file", $imgData);
	$home->bindParam(":applicant_id", $appid);
	$home->execute(); 
?>