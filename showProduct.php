<?php include('inc/session.php'); ?>

<?php

include('classes/Db.php');
include('classes/Product.php');

if(isset($_GET['product_id']))
{
  $product_id = $_GET['product_id'];
  
  $pro = new Product();
  $product = $pro->show($product_id);
}

?>

<!-- html head tag -->
<?php include('inc/head.php'); ?>

<body>

  <!-- Navbar -->
  <?php include('inc/navbar.php'); ?>


  <!-- content -->

  <?php if(isset($_GET['product_id']) && $product !== FALSE){ ?>

    <!-- Displayed if there are products -->
    <div class="container mt-5">
      <div class="row">

        <div class="col-md-6">
          <h3 class="mb-3">
            <?php echo $product['name']; ?>
          </h3>
          <div class="product-large-img">
            <img src="uploads/<?php echo $product['img']; ?>" class="d-block w-100">
          </div>
        </div>
        <div class="col-md-6">
          <div class="d-flex justify-content-between">
            <p class="price"><?php echo number_format($product['price']); ?> $</p>
            <p class="pieces-no"><?php echo $product['pieces_no']; ?> pieces</p>
          </div>
          <p>
          <small>
            <strong>By:</strong> 
            <?php echo $product['username']; ?>
            <strong>at</strong>
            <?php echo $product['created_at']; ?>
          </small>
          <br>
          <br>
          <?php echo $product['desc']; ?>
          </p>
        </div>

      </div>
    </div>
  <?php } else { ?>
  
  <!-- displayed when there are no products -->
  <div class="not-found d-flex justify-content-center align-items-center">
    Product Not Found
  </div>
  
  <?php } ?>

  <!-- -->
  

  <!-- footer -->
  <?php include('inc/footer.php'); ?>

  <!-- scripts -->
  <?php include('inc/scripts.php'); ?>

</body>
</html>