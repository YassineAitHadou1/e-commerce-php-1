
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E COMMERCE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Categories</a>
        </li>
        <?php
        if (!empty($_GET['productId'])) {
        include_once '../include/conn.php';
        $categoryId = $_GET['categoryId'];
        $stmt = $pdo->prepare('select * from category where categoryId = ?');
        $stmt->execute([$categoryId]);
        $category = $stmt->fetch(pdo::FETCH_ASSOC);
          ?>
          <li class="nav-item">
              <a  class="nav-link" href="category.php?id=<?php echo $category['categoryId'];?>">products</a>
          </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>