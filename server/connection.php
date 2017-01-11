<?php
$db_host = "localhost";
$db_name = "dblabor";
$db_user = "root";
$db_pass = "";

try
{
	$dbh = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>