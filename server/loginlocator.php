<?php
session_start();
include 'connection.php';

$user_name = trim($_POST['user_name']);
$user_password = trim($_POST['password']);

try
{
	$stmt = $dbh->prepare("SELECT * FROM tbl_locators WHERE locators_uname=:locators_uname");
	$stmt->execute(array(":locators_uname" => $user_name));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($row['locators_upass'] == $user_password){
		echo $row['locators_id'];
		$_SESSION['user_session'] = $row['locators_id'];
	}
	else{
		
		echo "user or password does not exist."; // wrong details 
	}
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>