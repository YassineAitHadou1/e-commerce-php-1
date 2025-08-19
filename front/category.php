<?php
require_once '../include/conn.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('select * from category where categoryId = ?');
$stmt->execute([$id]);
$category = $stmt->fetch(pdo::FETCH_ASSOC);



$stmt = $pdo->prepare('select * from product where categoryId = ?');
$stmt->execute([$id]);
$products = $stmt->fetchAll(pdo::FETCH_ASSOC);   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category | <?php echo $category['categoryName']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <div class="container">
        <h1><?php echo $category['categoryName']; ?> <i class="<?php echo $category['categoryIcon']?>"></i></h1>
        <div class="row">
            <?php 
            foreach ($products as $product) {
                ?>
                <div class="card mb-3 col-md-4 p-0 m-1">
                    <img width="250" height="350" src="../upload/product/<?= $product['productImg'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['productName']; ?></h5>
                        <p class="card-text"><?php echo $product['productDescription']; ?></p>
                        <p class="card-text"><?php echo $product['productPrice']; ?> dh</p>
                        <p class="card-text"><small class="text-body-secondary"> added <?= date_format(date_create($product['creation_date']),'Y/m/d') ; ?></small></p>
                    </div>
                </div>
                <?php
            }
            if (empty($products)) {
                ?>
                <div class="alert alert-info" role="alert">
                no products for now 
                </div>
                <?php
            }
            ?>
            
        </div>
    </div>
</body>
</html>