<?php

include('inc/session.php');
include('classes/Db.php');
include('classes/Product.php');
include('classes/Validator.php');


if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $pieces_no = $_POST['pieces_no'];
  $file = $_FILES['img'];

  // Get uploaded file info
  $file_name = $file['name'];
  $file_type = $file['type'];
  $file_tmp_name = $file['tmp_name'];
  $file_error = $file['error'];
  $file_size = $file['size'];

  $file_path_info = pathinfo($file_name);
  $ext = $file_path_info['extension'];


  /*

  Validation

  */



  $validator = new Validator();
  $name = $validator->name($name);
  if($desc !== '')
  {
    $desc = $validator->desc($desc);
  }
  $price = $validator->price($price);
  $pieces_no = $validator->pieces_no($pieces_no);
  $img = $validator->image($file_name, $file_error, $ext);

  $errors = $validator->errors;

  if($errors !== [])
  {
    $_SESSION['errors'] = $errors;
    header('location:addProduct.php');
  }
  else 
  {

    $new_name = uniqid(). '.'. $ext;
    $destination = 'uploads/'.$new_name;
    move_uploaded_file($file_tmp_name, $destination);
    $prod = new Product();
    $is_added = $prod->store($_SESSION['user_id'], $name, $desc, $price, $pieces_no, $new_name);
  
    header('location:yourProducts.php');
  }
 

}

else
{
  header('location:index.php');
}

