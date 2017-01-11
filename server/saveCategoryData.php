<?php
include 'connection.php';

$category_title = $_POST['category_title'];
$category_description = $_POST['category_description'];

$saveCategory = 'INSERT INTO tbl_category (category_title, category_description) VALUES (:category_title, :category_description)';
$saveCategoryStmt = $dbh->prepare($saveCategory);
$saveCategoryStmt->bindParam(':category_title', $category_title, PDO::PARAM_STR);
$saveCategoryStmt->bindParam(':category_description', $category_description, PDO::PARAM_INT);
$saveCategoryStmt->execute();
?>