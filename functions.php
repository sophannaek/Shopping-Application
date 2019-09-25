<?php // Example 26-1: functions.php
  $dbhost  = 'localhost';    // Unlikely to require changing
  $dbname  = 'SHOP';   // Modify these...
  $dbuser  = 'root';   // ...variables according
  $dbpass  = 'root';   // ...to your installation
  $appname = "Sofia Beauty"; // ...and preference
  //usisng mysqli object-oriented

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($connection->connect_error) die($connection->connect_error);

  $error_message = $connection->connect_error;
  if($error_message != null){
    include 'errors/db_error_connect.php';
    exit;
  }

  function display_db_error($error_message){
    global $app_path;
    include 'errors/db_error.php';
    exit;
  }

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');
    	session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }


//PRODUCT
function get_product($product_id){
  global $connection; 
  $query = "SELECT * FROM PRODUCT WHERE product_id ='$product_id'";
  $result = $connection->query($query); 
  if($result == false){
    display_db_error($connection->error);
  }
  $product =$result->fetch_assoc(); 

    $result ->free();
  return $product ;
}


//list all products
function get_products(){
    global $connection; 
    $query = 'SELECT * FROM PRODUCT ORDER BY product_id';
    $result = $connection->query($query); 
    if($result == false){
      display_db_error($connection->error);
    }

    $products = array(); 
    for($i=0; $i < $result->num_rows; $i++){
      $product = $result->fetch_assoc();
      $products[] = $product; 
    }
    $result->free();
    return $products;
}


//get products for a specific user/seller
function get_user_product($user_id){
    global $connection; 
    $query = "SELECT * FROM PRODUCT WHERE user_id = '$user_id'";
    $result = $connection->query($query); 
    if($result == false){
      display_db_error($connection->error);
    }

    $products = array(); 
    for($i=0; $i < $result->num_rows; $i++){
      $product = $result->fetch_assoc();
      $products[] = $product; 
    }
    $result->free();
    return $products;
}


function add_product($category_id,$code,$name,$price,$quantity,$user_id){
  global $connection;
 // $product_id_esc = $connection->escape_string($product_id);
  $query = 'INSERT INTO PRODUCT
            (category_id,product_code,product_name,unit_price,prod_quantity,user_id,dateAdded)
             VALUES 
             (?, ?, ?, ?, ?,?, NOW())';
  $statement = $connection->prepare($query);
  if($statement == false){
    display_db_error($connection->error);
  }
  $statement->bind_param("isssdd",$category_id,$code,$name,$price,$quantity,$user_id);
  $success = $statement->execute(); 
  if($success){
    $product_id = $connection->insert_id;
    $statement->close();
    return $product_id;

  }
  else{
    display_db_error($connection->error);
  }
}


function update_product($product_id,$category_id,$code,$name,$price,$quantity){
  global $connection;
 // $product_id_esc = $connection->escape_string($product_id);
  $query = "UPDATE PRODUCT
            SET category_id = ?,
                product_code = ?,
                product_name = ?,
                unit_price = ?,
                prod_quantity = ?
            WHERE product_id =  ?" ;
  $statement = $connection->prepare($query);
  if($statement == false){
    display_db_error($connection->error);
  }
  $statement->bind_param("isssdd",$category_id,$code,$name,$price,$quantity,$product_id);
  $success = $statement->execute();
  if($success){
   // $product_id = $connection->insert_id;
    $row_count = $connection->affected_rows;
    $statement->close();
    return $row_count;

  } 
  else{
    display_db_error($connection->error);
  }
}


/* delete product */

function delete_product($product_id){
  global $connection;
  $query = "DELETE FROM PRODUCT WHERE product_id ='$product_id' ";
  $statement= $connection->prepare($query);
   if($statement == false){
    display_db_error($connection->error);
  }
  $statement->bind_param("isssdd",$product_id);
  $success = $statement->execute(); 
  if($success){
    $statement->close();
    return $success;
  }else {
    display_db_error($connection->error);
  }

}


  function showProfile($user)
  {
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  } 
?>
