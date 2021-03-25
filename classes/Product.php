<?php

class Product {

  // Read all products data
  public function index()
  {
    global $conn;

    $sql = "SELECT users.username, products.*, product_imgs.img_id, product_imgs.img
      FROM users JOIN products JOIN product_imgs
      ON users.user_id = products.user_id 
      AND products.product_id = product_imgs.product_id
      ORDER BY products.product_id DESC
    ";

    $result = $conn->query($sql);
    $products = [];

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
      return $products;
    } else {
      return false;
    }
  }

  // Show product data
  public function show($product_id)
  {
    global $conn;

    $sql = "SELECT users.username, products.*, product_imgs.img_id, product_imgs.img
      FROM users JOIN products JOIN product_imgs
      ON users.user_id = products.user_id 
      AND products.product_id = product_imgs.product_id
      WHERE products.product_id = '$product_id'
    ";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      // output data of each row
      $product = $result->fetch_assoc();
      return $product;
    } else {
      return false;
    }
  }

  // Read all user products
  public function showUserProducts($user_id)
  {
    global $conn;

    $sql = "SELECT users.username, products.*, product_imgs.img_id, product_imgs.img
      FROM users JOIN products JOIN product_imgs
      ON users.user_id = products.user_id 
      AND products.product_id = product_imgs.product_id
      WHERE products.user_id = '$user_id'
      ORDER BY products.product_id DESC
    ";

    $result = $conn->query($sql);
    $products = [];

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        array_push($products, $row);
      }
      return $products;
    } else {
      return false;
    }
  }

  // Adding new product
  public function store($user_id, $name, $desc, $price, $pieces_no, $img)
  {
    global $conn;

    // prepare values before query
    $name = mysqli_real_escape_string($conn, $name);
    $desc = mysqli_real_escape_string($conn, $desc);
  
    // executing query and return last index if successful
    $sql = "INSERT INTO products (`user_id`, `name`, `desc`, price, pieces_no, created_at)
      VALUES ('$user_id', '$name', '$desc', '$price', '$pieces_no', CURRENT_DATE())
    ";
  
    if ($conn->query($sql) === TRUE) {
      $last_id = $conn->insert_id;

      $sql = "INSERT INTO product_imgs (`product_id`, `img`)
        VALUES ('$last_id', '$img')
      ";

      if ($conn->query($sql) === TRUE) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }


  public function update($product_id, $name, $desc, $price, $pieces_no)
  {
    global $conn;

    // prepare values before query
    $name = mysqli_real_escape_string($conn, $name);
    $desc = mysqli_real_escape_string($conn, $desc);

    $sql = "UPDATE products SET
      `name` = '$name',
      `desc` = '$desc',
      `price` = '$price',
      `pieces_no` = '$pieces_no'
      WHERE product_id = '$product_id'
    ";

    if ($conn->query($sql) === TRUE) {
      return true;
    } else {
      return false;
    }  
  }

  public function delete($product_id, $user_id)
  {
    global $conn;

    $sql = "DELETE FROM products
      WHERE product_id = '$product_id'
      AND `user_id` = '$user_id'
    ";

    if ($conn->query($sql) === TRUE) {
      return true;
    } else {
      return false;
    }

  }
}

?>