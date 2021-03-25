<?php 

class Validator {

  var $errors = [];

  public function username($username)
  {
    if($username == '')
    {
      $error = 'username can not be null';
    }
    else if(!is_string($username))
    {
      $error = 'username must be string';
    }
    else if(strlen($username) < 5)
    {
      $error = 'username must be greater than 5 characters';
    }
    else if(strlen($username) > 100)
    {
      $error = 'username must be less than 100 characters';
    }
    else 
    {
      return $username;
    }
    array_push($this->errors, $error);
    return false;
  }

  public function email($email)
  {
    if($email == '')
    {
      $error = 'email can not be null';
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $error = 'email is not valid';
    }
    else if (strlen($email) > 100)
    {
      $error = 'email must be less than 100 characters';
    }
    else {
      return $email;
    }

    array_push($this->errors, $error);
    return false;
  }

  public function password($password, $confirm_password = null)
  {
    if($password == '')
    {
      $error = 'password can not be null';
    }
    else if(!is_string($password))
    {
      $error = 'password must be string';
    }
    else if(strlen($password) < 5)
    {
      $error = 'password must be greater than 5 characters';
    }
    else if(strlen($password) > 50)
    {
      $error = 'password must be less than 50 characters';
    }
    else if($confirm_password !== null && $password !== $confirm_password)
    {
      $error = 'password and confirm password do not match';
    }
    else 
    {
      return $password;
    }
    array_push($this->errors, $error);
    return false;
  }

  public function name($name)
  {
    if($name == '')
    {
      $error = 'name can not be null';
    }
    else if(!is_string($name))
    {
      $error = 'name must be string';
    }
    else if(strlen($name) < 5)
    {
      $error = 'name must be greater than 5 characters';
    }
    else if(strlen($name) > 200)
    {
      $error = 'name must be less than 200 characters';
    }
    else 
    {
      return $name;
    }
    array_push($this->errors, $error);
    return false;
  }

  public function desc($desc)
  {
    if(!is_string($desc))
    {
      $error = 'desc must be string';
    }
    else if(strlen($desc) > 3000)
    {
      $error = 'desc must be less than 3000 characters';
    }
    else 
    {
      return $desc;
    }
    array_push($this->errors, $error);
    return false;
  }

  public function price($price)
  {
    if($price == '')
    {
      $error = 'price can not be null';
    }
    else if(!is_numeric($price))
    {
      $error = 'price must be double';
    }
    else 
    {
      return $price;
    }

    array_push($this->errors, $error);
    return false;
  }

  public function pieces_no($pieces_no)
  {
    if($pieces_no == '')
    {
      $error = 'pieces no can not be null';
    }
    else if(!is_numeric($pieces_no))
    {
      $error = 'pieces no must be integer';
    }
    else 
    {
      return $pieces_no;
    }

    array_push($this->errors, $error);
    return false;
  }

  public function image($file_name, $file_error, $ext)
  {
    $types = ['jpg', 'jpeg', 'png', 'gif'];

    if($file_name == '')
    {
      $error = 'image is required';
    }
    else if($file_error !== 0)
    {
      $error = 'error while uploading image';
    }
    else if(!in_array($ext, $types))
    {
      $error = 'your file is not an image';
    }
    else 
    {
      return true;
    }

    array_push($this->errors, $error);
    return false;
  }
}