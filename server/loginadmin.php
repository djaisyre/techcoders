<?php
session_start();
include 'connection.php';

$user_name = trim($_POST['user_name']);
$user_password = trim($_POST['password']);

try
{
	$stmt = $dbh->prepare("SELECT * FROM tbl_admin WHERE admin_uname = :admin_uname");
	$stmt->execute(array(":admin_uname" => $user_name));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($row['admin_upass'] == $user_password){
		echo $row['admin_id'];
		$_SESSION['user_session'] = $row['admin_id'];
	}
	else{
		
		echo "user or password does not exist."; // wrong details 
	}
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>