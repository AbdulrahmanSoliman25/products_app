<?php include('inc/session.php'); ?>

<?php 

if(!isset($_SESSION['user_id']))
{
  header('location:login.php');
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
  <div class="container form-container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3 form-col">
        <form action="handleAddProduct.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Product name</label>
            <input type="text" class="form-control" name="name"  id="name">
          </div>
          <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" name="desc" id="desc" rows="8"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pieces_no">Pieces Number</label>
                <input type="number" class="form-control" name="pieces_no" id="pieces_no">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="img">Image</label>
            <input type="file" class="form-control" name="img"  id="img">
          </div>

          <div class="text-center">
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- footer -->
  <?php include('inc/footer.php'); ?>

  <!-- scripts -->
  <?php include('inc/scripts.php'); ?>
  
</body>
</html>