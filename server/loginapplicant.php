<?php
session_start();
include 'connection.php';

$user_name = trim($_POST['user_name']);
$user_password = trim($_POST['password']);

try
{	
	$stmt = $dbh->prepare("SELECT * FROM tbl_applicant WHERE applicant_username = :applicant_username");
	$stmt->execute(array(":applicant_username" => $user_name));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($row['applicant_password'] == $user_password){
		echo $row['applicant_id'];
		$_SESSION['user_session'] = $row['applicant_id'];
	}
	else{
		
		echo "User or Password does NOT EXIST."; // wrong details 
	}
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>