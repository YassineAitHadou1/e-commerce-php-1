
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>add category</title>
</head>
<body>
<?php 
include 'include/nav.php'?>
<div class="container">
    <h1>add category</h1>
    <?php 
   if(isset($_POST['add'])){
    $name = $_POST['categoryName'];
    $desc = $_POST['categoryDesc'];

    if (!empty($name) && !empty($desc)) {
        require_once 'include/conn.php';
        $stmt = $pdo->prepare('insert into category(categoryName,description) values(?,?)');
        $stmt->execute([$name,$desc]);
            header('location:categories.php');
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            name and description are required!
        </div>
               <?php
    }
   }
    ?>
<form  method="post">
  <div class="mb-3">
    <label class="form-label">name</label>
    <input type="text" class="form-control" name="categoryName" >
  </div>
  <div class="mb-3">
    <label class="form-label">description</label><br>
    <textarea class="form-control" name="categoryDesc"></textarea>
  </div>
  <input type="submit" value="Add Category" class="btn btn-primary btn-lg" name="add"></input>
</form>
</div>
</body>
</html>