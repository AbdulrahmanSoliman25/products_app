<?php include('inc/session.php'); ?>

<?php

if(isset($_SESSION['user_id']))
{
  header('location:index.php');
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
        <form action="handleRegister.php" method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm_password">
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