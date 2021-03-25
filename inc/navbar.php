<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <a class="navbar-brand" href="index.php">Route Backend</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Products</a>
      </li>
      <?php if(isset($_SESSION['username'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="yourProducts.php">Your Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addProduct.php">Add New</a>
        </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php if(!isset($_SESSION['username'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['username']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="handleLogout.php" onclick="return confirm('Do you want to logout?');">Logout</a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>
