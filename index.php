<?php include('inc/session.php'); ?>

<?php

include('classes/Db.php');
include('classes/Product.php');

$pro = new Product();
$products = $pro->index();

?>

<!-- html head tag -->
<?php include('inc/head.php'); ?>

<body>

  <!-- Navbar -->
  <?php include('inc/navbar.php'); ?>


  <!-- content -->

  <?php if($products !== FALSE){ ?>

    <!-- Displayed if there are products -->
    <div class="container mt-5">
      <div class="row">

          <?php foreach($products as $product) { ?>
            <!-- product card -->
            <div class="col-md-4 mb-3">
              <div class="card">
                <img src="uploads/<?php echo $product['img']; ?>" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $product['name']; ?>
                  </h5>
                  <p>
                    <small>
                      <strong>By:</strong>
                      <?php echo $product['username']; ?>
                    </small>
                  </p>
                  <p class="card-text">
                    <?php echo substr($product['desc'], 0, 50) . ' ...'; ?>
                  </p>
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <a href="showProduct.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary">
                        <i class="fa fa-eye"></i>
                      </a>
                      <?php if(isset($_SESSION['user_id']) && $product['user_id'] == $_SESSION['user_id']) { ?>
                        <a href="editProduct.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-info">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="handleDeleteProduct.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this product?');">
                          <i class="fa fa-trash"></i>
                        </a>
                      <?php } ?>
                    </div>
                    <p class="price">
                      <?php echo number_format($product['price']); ?> $
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        
      </div>
    </div>
  <?php } else { ?>
  
  <!-- displayed when there are no products -->
  <div class="not-found d-flex justify-content-center align-items-center">
    No products found yet
  </div>
  
  <?php } ?>

  <!-- -->
  

  <!-- footer -->
  <?php include('inc/footer.php'); ?>

  <!-- scripts -->
  <?php include('inc/scripts.php'); ?>

</body>
</html>