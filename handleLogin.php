<?php

include('inc/session.php');
include('classes/Db.php');
include('classes/User.php');
include('classes/Validator.php');

if(isset($_POST['submit']))
{
  // Read user inputs
  $email = $_POST['email'];
  $password = $_POST['password'];

  /*
  
  Validation
  
  */
  $validator = new Validator();
  $email = $validator->email($email);
  $password = $validator->password($password);

  $errors = $validator->errors;

  if($errors !== [])
  {
    $_SESSION['errors'] = $errors;
    header('location:login.php');
  }
  else 
  {
    // login using user class 
    $user = new User();
    $is_login = $user->login($email, $password);

    // check if logged in
    if($is_login !== FALSE)
    {
      // set session variables and redirect to index
      $_SESSION['user_id'] = $is_login["user_id"];
      $_SESSION['username'] = $is_login["username"];
      header('location:index.php');
    } 
    else {
  
      // redirect back to login
      $_SESSION['errors'] = ['failed to login'];
      header('location:login.php');
    }

    $conn->close();
  }

} 

else
{
  header('location:index.php');
}




?>