
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>products</title>
</head>
<body>
<?php 
include 'include/nav.php'?>
<div class="container">
    <h1>products list</h1>
    <a href="addProduct.php" class="btn btn-primary">add product</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>DISCOUNT</th>
            <th>CATEGORY</th>
            <th>DATE</th>
            <th>OPERATION</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'include/conn.php';
        $products = $pdo->query("select product.*,category.categoryName as 'categoryName' from product inner join category on product.categoryId = category.categoryId")->fetchAll(pdo::FETCH_ASSOC);
        foreach ($products as $product) {
            $price = $product['productPrice'];
            $discount = $product['discount'];
            $finalePrice = $price - ($price*$discount)/100;
            ?>
            <tr>
            <td> <?php echo $product['productId']; ?></td>
            <td> <?php echo $product['productName']; ?></td>
            <td> <?php echo $finalePrice;?> dh</td>
            <td> <?php echo $product['discount']; ?>%</td>
            <td> <?php echo $product['categoryName']; ?></td>
            <td> <?php echo $product['creation_date']; ?></td>
            <td>
                <a href="modifyProduct.php?id=<?php echo $product['productId']?>" class="btn btn-primary">modify</a>
                <a href="deleteProduct.php?id=<?php echo $product['productId']?>"onclick="return confirm('are you sure about delete <?php echo $product['productName'];?> ? ')" class="btn btn-danger">delete</a>
            </td>
            </tr>
            <?php
        }
        ?>
                <tr>
                </tr>
                <?php
                
                ?>
        </tbody>
    </table>
</div>
</body>
</html>
