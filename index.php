
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
    <h1>add user</h1>
    <?php 
    if(isset($_POST['add'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        if(!empty($login) && !empty($password)){
            require_once 'include/conn.php';
            $date = date('y-m-d');
            $stmt = $pdo->prepare('insert into user values(null,?,?,?)');
            $stmt->execute([$login,$password,$date]);
            // redirect
            header('location: login.php');
            
        }else {
               ?>
               <div class="alert alert-danger" role="alert">
                login and password are required !
                </div>
               <?php
            }
        
        }
    ?>
<form  method="post">
  <div class="mb-3">
    <label class="form-label">Login</label>
    <input type="text" class="form-control" name="login" >
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" >
  </div>
  <input type="submit" value="Add User" class="btn btn-primary btn-lg" name="add"></input>
</form>
</div>
</body>
</html>