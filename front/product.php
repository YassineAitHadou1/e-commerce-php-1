<?php
require_once '../include/conn.php';
$id = $_GET['productId'];
$stmt = $pdo->prepare('select * from product where productId = ?');
$stmt->execute([$id]);
$product = $stmt->fetch(pdo::FETCH_ASSOC);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['productName']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php 
    include 'navFront.php';
    ?>
    
    <div class="container">
        <h1><?php echo $product['productName']; ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img img-fluid w-75" src="../upload/product/<?= $product['productImg']; ?>" alt="">
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <h1 class="w-75"><?=  $product['productName']; ?></h1>

                        <?php
                            $price = $product['productPrice'] ;
                            $discount = $product['discount'];
                            if(!empty($discount)){
                            $total = $price - ($price * $discount)/100;?>
                            <span class="badge text-bg-secondary"> - <?= $discount;?>%</span>
                            <?php };
                            ?>
                    </div>
                    <hr>

                        <p>
                            <?=  $product['productDescription']; ?>    
                        </p>
                    <hr>
                    <?php
                    
                    if(!empty($discount)){
                        $total = $price - ($price * $discount)/100;?>
                            <h4> 
                                <span class="badge text-bg-danger"><strike><?=$price?></strike>  MAD</span>
                                <span class="badge text-bg-success"> <?=$total?> MAD</span>     
                            </h4>
                            
                    <?php
                    }
                    else{
                        $total = $price;
                        ?>
                        <h5>
                            <span class="badge text-bg-secondary"> <?=$total?> MAD</span>   
                        </h5><?php  
                    }
                    ?> 
                        <hr>
                        <a class="btn btn-primary" href="#">add to cart</a>
                </div>
            </div>
            
        </div>
        

    </div>
</body>
</html>