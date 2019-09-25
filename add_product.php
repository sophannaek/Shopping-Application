<!-- add_product.php --> 
<?php require_once 'header.php'; ?>
<?php

// Get the product data

$category_id = $_POST['category_id'];
$code = $_POST['code'];
$price = $_POST['price'];
$name = $_POST['name'];
$product_quantity = $_POST['prod_quantity'];
//$heading = $_POST['submit'];

if(!$loggedin){
          die("You must <a href='login.php'>log in </a> to see your account.");

}else{
  
    $result = queryMysql("SELECT * FROM USER WHERE user_email='$user'");
    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];

     echo 'code is '.$code .$price . $product_quantity;

   


    // Validate inputs
    if ($category_id == null || $code == null || $price == null || $product_quantity == null){
        $error_message = "Invalid product data. Check all fields and try again.<br/>";
        include('add_product_form.php');

     //   include('errors/db_error.php');
    } else {//all fields were entered

        $action_type = 'adding_product';

        if(isset($_POST['product_id']) || $_POST['product_id'] !== '' ){
            echo "hey";
        }
       add_product($category_id,$code,$name,$price,$product_quantity,$user_id);
         
         $added_product_msg = "successfully inserted! ";

           // Display the Product List page
       include('myAccount.php');

      }
     


      
    


}


?>

