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

  $errors = $validator->errors;

  if($errors !== [])
  {
    $_SESSION['errors'] = $errors;
    header('location:editProduct.php?product_id='. $_SESSION['product_id']);
  }

  else 
  {
    $prod = new Product();
    $is_added = $prod->update($_SESSION['product_id'], $name, $desc, $price, $pieces_no);
  
    if($is_added == true)
    {
      header('location:showProduct.php?product_id='. $_SESSION['product_id']);
    } else 
    {
      header('location:editProduct.php?product_id='. $_SESSION['product_id']);
    }
  }



}

else
{
  header('location:index.php');
}

