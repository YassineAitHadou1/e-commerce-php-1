<?php 
$userId = $_SESSION['user']['userId'];
$quantity = $_SESSION['cart'][$userId][$productId] ?? 0;
$btn = $quantity == 0 ? 'add' : 'edit';

?>

<form method="post" class="counter d-flex align-items-center gap-2" action="../include/front/addToCart.php">
    <button onclick="return false;" class="btn btn-primary counterDown">-</button>
    <input type="hidden" name="productId" value="<?php echo $productId?>">
    <input type="hidden" name="categoryId" value="<?php echo $id?>">  
    <input type="number" class="quantity" name="quantity" value="<?php echo $quantity ?>" max="99" id="quantity">
    <button onclick="return false;" class="btn btn-primary counterUp">+</button>
    <input  type="submit" class="btn btn-success" value="<?= $btn?>" name="add">
</form>