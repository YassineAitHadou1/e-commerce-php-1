
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php 
include 'include/nav.php'?>
<div class="container">
    <h1>modify product</h1>
   <?php  
    require_once 'include/conn.php';
    $id = $_GET['id'];
    $stmt = $pdo->prepare("select product.*,category.categoryName as 'categoryName' from product inner join category on product.categoryId = category.categoryId  where ProductId = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(pdo::FETCH_OBJ);
    ?>

  <?php 
   if(isset($_POST['modify'])){
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $discount = $_POST['discount'];
    $category = $_POST['category'];
    $productDescription = $_POST['productDescription'];
    $productImg = '';
        if (!empty($_FILES['productImg']['name'])){
          $formImg = $_FILES['productImg']['name'];
          $productImg = uniqid().$formImg;
        }

    if (!empty($name) && !empty($price)) {

      if(!empty($productImg)){
        move_uploaded_file($_FILES['productImg']['tmp_name'],'upload/product/'.$productImg);
        $stmt = $pdo->prepare('update product 
                                    set productName = ?,
                                    productPrice = ?,
                                    discount = ?,
                                    categoryId = ?,
                                    productImg = ?,
                                    productDescription = ?
                                    where productId = ?
                                                ');
        $stmt->execute([$name,$price,$discount,$category,$productImg,$productDescription,$id]);
            header('location:products.php');
      }else{
        $stmt = $pdo->prepare('update product 
                                    set productName = ?,
                                    productPrice = ?,
                                    discount = ?,
                                    categoryId = ?,
                                    productDescription = ?
                                    where productId = ?
                                                ');
        $stmt->execute([$name,$price,$discount,$category,$productDescription,$id]);
            header('location:products.php');
      }


        
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            fields are required!
        </div>
               <?php
    }
   }
    ?>
    <form  method="post" enctype="multipart/form-data">
  <div class="mb-3" hidden>
    <label class="form-label">id</label>
    <input type="number" class="form-control" value="<?= $product->productId?>" name="productId">
  </div>
  <div class="mb-3">
    <label class="form-label">name</label>
    <input type="text" class="form-control" value="<?= $product->productName?>" name="productName">
  </div>
  <div class="mb-3">
    <label class="form-label">price</label>
    <input type="number" class="form-control" value="<?= $product->productPrice?>" name="productPrice">
  </div>
  <div class="mb-3">
    <label class="form-label">discount</label><br>
    <input type="range" class="form-control" value="<?= $product->discount?>" name="discount"></input>
  </div>
   <pre>
  <?php
    $stmt = $pdo->prepare('select * from category');
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC ); 
    ?>
    </pre>
  <select name="category" class="form-control">
    <!-- <option value="">select category</option> -->
    <?php
    foreach ($categories as $category) {
        echo "<option value='".$category['categoryId']."'>".$category['categoryName']."</option>";
    }
    ?>
  </select><br>
    <div class="mb-3">
        <label class="form-label">image</label><br>
        <input type="file" class="form-control" name="productImg" ></input>
        <?php
        ?>
        <img width="250" src="upload/product/<?= $product->productImg ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">description</label><br>
        <textarea class="form-control" name="productDescription" ><?= $product->productDescription ?></textarea>
      </div> 
  <input type="submit" value="modify product" class="btn btn-primary btn-lg" name="modify"></input>
</form>
</div>
</body>
</html>