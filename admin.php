
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>admibn</title>
</head>
<body>
<?php 
include 'include/nav.php'?>
<div class="container">
<?php 
  session_start();
  if(!isset($_SESSION['user'])){
    header('location: login.php');
  }
?>
<h3> welcome back <?php 
echo $_SESSION['user']['login'];
        ?></h3>
</div>
</body>
</html>