<?php 
include_once'include/conn.php';
$id = $_GET['id'];
$productsDelete = $pdo->prepare('delete from product where categoryId = ?');
$productsDelete->execute([$id]);
$categoryDelete = $pdo->prepare('delete from category where categoryId = ?');
$categoryDelete->execute([$id]);
header("location:categories.php");
?>
