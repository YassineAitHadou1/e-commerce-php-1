
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>add product</title>
</head>
<body>
<?php 
include 'include/nav.php';
include_once 'include/conn.php';
?>
<div class="container">
    <h1>add product</h1>
    <?php 
    if (isset($_POST['add'])){
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $discount = $_POST['discount'];
        $category = $_POST['category'];

        if (!empty($productName) && !empty($productPrice)  && !empty($category) ) {
            $stmt = $pdo->prepare('insert into product(productName,productPrice,discount,categoryId) values (?,?,?,?)');
            $stmt->execute([$productName,$productPrice,$discount,$category]);
            header('location:products.php');
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
            fields are required!
            </div>
            <?php
        }
    }
    ?>
<form  method="post">
  <div class="mb-3">
    <label class="form-label">name</label>
    <input type="text" class="form-control" name="productName" >
  </div>
  <div class="mb-3">
    <label class="form-label">price</label><br>
    <input type="number" class="form-control" name="productPrice" step="0.1" min="1"></input>
  </div>
  <div class="mb-3">
    <label class="form-label">discount</label><br>
    <input type="range" class="form-control" name="discount" min="0" max="90"></input>
  </div>
  <pre>
  <?php
    $stmt = $pdo->prepare('select * from category');
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC ); 
    ?>
    </pre>
  <select name="category" class="form-control">
    <option value="">select category</option>
    <?php
    foreach ($categories as $category) {
        echo "<option value='".$category['categoryId']."'>".$category['categoryName']."</option>";
    }
    ?>
    
    
  </select><br>
  <input type="submit" value="Add Product" class="btn btn-primary btn-lg" name="add"></input>
</form>
</div>
</body>
</html>