<?php 
session_start();
if(!isset($_SESSION['user'])){
    header('location:../../login.php');
}
$productId = $_POST['productId'];
$categoryId = $_POST['categoryId'];
$quantity = $_POST['quantity'];
$userId = $_SESSION['user']['userId'];



    if(!isset($_SESSION['cart'][$userId])){
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][$userId][$productId] = $quantity;

    header("location: ../../front/product.php?productId=$productId&categoryId=$categoryId");
?>