<?php
include 'connection.php';

if(isset($_POST['saveAdmin'])) {
	$admin_lname = $_POST['admin_lname'];
	$admin_fname = $_POST['admin_fname'];
	$admin_email = $_POST['admin_email'];
	$admin_uname = $_POST['admin_uname'];
	$admin_upass = $_POST['admin_upass'];
	
	$saveAdmin = 'INSERT INTO tbl_admin (admin_lname, admin_fname, admin_email, admin_uname, admin_upass) VALUES 
	(:admin_lname, :admin_fname, :admin_email, :admin_uname, :admin_upass)';
	$saveAdminStmt = $dbh->prepare($saveAdmin);
	$saveAdminStmt->bindParam(':admin_lname', $admin_lname, PDO::PARAM_STR);
	$saveAdminStmt->bindParam(':admin_fname', $admin_fname, PDO::PARAM_STR);
	$saveAdminStmt->bindParam(':admin_email', $admin_email, PDO::PARAM_STR);
	$saveAdminStmt->bindParam(':admin_uname', $admin_uname, PDO::PARAM_STR);
	$saveAdminStmt->bindParam(':admin_upass', $admin_upass, PDO::PARAM_STR);
	$saveAdminStmt->execute();
}
?>