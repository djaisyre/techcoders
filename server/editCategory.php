<?php
include 'connection.php';

$category_title = $_POST['category_title'];
$category_description = $_POST['category_description'];
$category_id = $_POST['category_id'];

$editCategory = 'UPDATE tbl_category SET category_title = :category_title, category_description = :category_description WHERE category_id = :category_id';
$editCategoryStmt = $dbh->prepare($editCategory);
$editCategoryStmt->bindParam(':category_title', $category_title, PDO::PARAM_STR);
$editCategoryStmt->bindParam(':category_description', $category_description, PDO::PARAM_INT);
$editCategoryStmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
$editCategoryStmt->execute();
?>