<?php
include 'connection.php';

if(isset($_POST['editAdmin'])) {
	$admin_lname = $_POST['admin_lname'];
	$admin_fname = $_POST['admin_fname'];
	$admin_email = $_POST['admin_email'];
	$admin_uname = $_POST['admin_uname'];
	$admin_upass = $_POST['admin_upass'];
	$admin_status = $_POST['admin_status'];
	$admin_id = $_POST['admin_id'];
	
	$editAdmin = 'UPDATE tbl_admin SET admin_lname = :admin_lname, admin_fname = :admin_fname, admin_email = :admin_email, admin_uname = :admin_uname, admin_upass = :admin_upass, admin_status = :admin_status WHERE admin_id = :admin_id';
	$editAdminStmt = $dbh->prepare($editAdmin);
	$editAdminStmt->bindParam(':admin_lname', $admin_lname, PDO::PARAM_STR);
	$editAdminStmt->bindParam(':admin_fname', $admin_fname, PDO::PARAM_STR);
	$editAdminStmt->bindParam(':admin_email', $admin_email, PDO::PARAM_STR);
	$editAdminStmt->bindParam(':admin_uname', $admin_uname, PDO::PARAM_STR);
	$editAdminStmt->bindParam(':admin_upass', $admin_upass, PDO::PARAM_STR);
	$editAdminStmt->bindParam(':admin_status', $admin_status, PDO::PARAM_INT);
	$editAdminStmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
	$editAdminStmt->execute();
}
?>