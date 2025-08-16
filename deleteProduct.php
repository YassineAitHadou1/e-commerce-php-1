<?php 
include_once'include/conn.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('delete from product where productId = ?');
$stmt->execute([$id]);
header("location:products.php");
?>
