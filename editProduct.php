<?php include('inc/session.php'); ?>

<?php

include('classes/Db.php');
include('classes/Product.php');

if(!isset($_SESSION['user_id']))
{
  header('location:login.php');
}
else 
{
  if(isset($_GET['product_id']))
  {
    $product_id = $_GET['product_id'];
    
    $pro = new Product();
    $product = $pro->show($product_id);
  
    // Save product id in SESSION
    $_SESSION['product_id'] = $product_id;
  }
}



?>



<!-- html head tag -->
<?php include('inc/head.php'); ?>

<body>

  <!-- Navbar -->
  <?php include('inc/navbar.php'); ?>

  <?php if(isset($_SESSION['errors']) and $_SESSION['errors'] != []) { ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <ul class="errors-list bg-danger">
            <?php foreach($_SESSION['errors'] as $error) { ?>
              <li><?php echo $error; ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  <?php } ?>
  
  <?php $_SESSION['errors'] = []; ?>


  <!-- content -->
  <!-- form -->

  <?php if(isset($_GET['product_id']) && $product !== FALSE && $product['user_id'] == $_SESSION['user_id']) { ?>
    <div class="container form-container mt-5">
      <div class="row">
        <div class="col-md-6 offset-md-3 form-col">
          <form action="handleEditProduct.php" method="POST">
            <div class="form-group">
              <label for="name">Product name</label>
              <input type="text" class="form-control" name="name"  id="name" value="<?php echo $product['name'] ?>">
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" name="desc" id="desc" rows="8">
                <?php echo $product['desc'] ?>
              </textarea>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" name="price" id="price" value="<?php echo $product['price'] ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pieces_no">Pieces Number</label>
                  <input type="number" class="form-control" name="pieces_no" id="pieces_no" value="<?php echo $product['pieces_no'] ?>">
                </div>
              </div>
            </div>

            <div class="text-center">
              <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } else { ?>

    <div class="not-found d-flex justify-content-center align-items-center">
      Product Not Found
    </div>


  <?php } ?>
  
  <!-- footer -->
  <?php include('inc/footer.php'); ?>

  <!-- scripts -->
  <?php include('inc/scripts.php'); ?>
  
</body>
</html>