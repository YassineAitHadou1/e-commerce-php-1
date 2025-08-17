<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <?php include 'navFront.php';?>
    <div class="container py-2">
        <h1><i class="fa-solid fa-list"></i>CATEGORIES</h1>
        <?php
        include_once '../include/conn.php';
        $categories = $pdo->query('select * from category')->fetchAll(pdo::FETCH_OBJ);
        ?>
        <ul class="list-group list-group-flush">
            <?php
            foreach ($categories as $category) {
                ?>
                <li class="list-group-item">
                    
                    <a  class="btn btn-light" href="category.php?id=<?php echo $category->categoryId?>">
                        <i class="<?php echo $category->categoryIcon;?>"></i> 
                        <?php echo $category->categoryName;?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>

    </div>

</body>
</html>