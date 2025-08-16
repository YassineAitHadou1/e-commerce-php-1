
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>categories</title>
</head>
<body>
<?php 
include 'include/nav.php'?>
<div class="container">
    <h1>categories list</h1>
    <a href="addCategory.php" class="btn btn-primary">add category</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>DATE</th>
            <th>OPERATION</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            include_once 'include/conn.php';
            $categories = $pdo->query('select*from category')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $category) {
                ?>
                <tr>
                    <td><?php echo $category['categoryId']; ?></td>
                    <td><?php echo $category['categoryName'];?></td>
                    <td><?php echo $category['description'];?></td>
                    <td><?php echo $category['creation_date'];?></td>
                    <td>
                        <a href="modifyCategory.php?id=<?php echo $category['categoryId'] ?>" class="btn btn-primary">Modify</a>
                        <a href="deleteCategory.php?id=<?php echo $category['categoryId'] ?>" onclick="return confirm('are you sure about delete <?php echo $category['categoryName'];?> category ? ')" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
