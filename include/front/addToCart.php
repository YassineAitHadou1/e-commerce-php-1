<?php 
session_start();
if(!isset($_SESSION['user'])){
    header('location:../../login.php');
}
$productId = $_POST['productId'];
$categoryId = $_POST['categoryId'];
$quantity = $_POST['quantity'];
$userId = $_SESSION['user']['userId'];
// var_dump($categoryId);die(); 


    if(!isset($_SESSION['cart'][$userId])){
        $_SESSION['cart'] = [];
    }
    if($quantity == 0){
    unset($_SESSION['cart'][$userId][$productId]);
    }else{
   $_SESSION['cart'][$userId][$productId] = $quantity;
    }

    header("location: ../../front/product.php?productId=$productId&categoryId=$categoryId");
?>