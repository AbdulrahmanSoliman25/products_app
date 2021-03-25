<?php

include('inc/session.php');
include('classes/Db.php');
include('classes/User.php');
include('classes/Validator.php');

if(isset($_POST['submit']))
{
  // Read user inputs
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  /*
  
  Validation
  
  */
  $validator = new Validator();
  $username = $validator->username($username);
  $email = $validator->email($email);
  $password = $validator->password($password, $confirm_password);

  $errors = $validator->errors;

  if($errors !== [])
  {
    $_SESSION['errors'] = $errors;
    header('location:register.php');
  }
  else 
  {
    // register using user class   
    $user = new User();
    $is_registered = $user->register($username, $email, $password);

    // check if registered successfully
    if ($is_registered !== FALSE) 
    {
  
      // set session variables and redirect to index
      $_SESSION['user_id'] = $is_registered;
      $_SESSION['username'] = $username;
      header('location:index.php');
      
    } 
    else {
  
      // redirect back to register
      $_SESSION['errors'] = ['failed to register!'];
      header('location:register.php');
  
    }
    $conn->close();
  }
}

else
{
  header('location:index.php');
}




?>