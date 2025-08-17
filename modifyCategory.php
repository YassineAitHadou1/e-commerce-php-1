
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
    <h1>modify category</h1>
   <?php  
    require_once 'include/conn.php';
    $id = $_GET['id'];
    $stmt = $pdo->prepare('select * from category where categoryId = ?');
    $stmt->execute([$id]);
    $category = $stmt->fetch(pdo::FETCH_OBJ);
    ?>
<form  method="post">
  <div class="mb-3" hidden>
    <label class="form-label">id</label>
    <input type="number" class="form-control" value="<?= $category->categoryId?>" name="categoryId">
  </div>
  <div class="mb-3">
    <label class="form-label">name</label>
    <input type="text" class="form-control" value="<?= $category->categoryName?>" name="categoryName">
  </div>
  <div class="mb-3">
    <label class="form-label">description</label><br>
    <textarea  class="form-control" name="categoryDesc"><?= $category->description?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">icon</label>
    <input type="text" class="form-control" value='<?= $category->categoryIcon?>' name="categoryIcon">
  </div>
  <input type="submit" value="modify category" class="btn btn-primary btn-lg" name="modify"></input>
  <?php 
   if(isset($_POST['modify'])){
    $name = $_POST['categoryName'];
    $desc = $_POST['categoryDesc'];
    $icon = $_POST['categoryIcon'];

    if (!empty($name) && !empty($desc) && !empty($icon)) {
        $stmt = $pdo->prepare('update category 
                                    set categoryName = ?,
                                    description = ?,
                                    categoryIcon = ?
                                    where categoryId = ?
                                                ');
        $stmt->execute([$name,$desc,$icon,$id]);
            header('location:categories.php');
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            name,description and icon are required!
        </div>
               <?php
    }
   }
    ?>
</form>
</div>
</body>
</html>