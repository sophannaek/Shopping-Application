<!-- update product page --> 

<?php require_once 'header.php'; ?>
<?php

// Get the product data

$category_id = $_POST['category_id'];
$code = $_POST['code'];
$price = $_POST['price'];
$name = $_POST['name'];
$product_quantity = $_POST['prod_quantity'];
$product_id =$_POST['product_id'];

$action = $_POST['action'];

if(!$loggedin){
          die("You must <a href='login.php'>log in </a> to see your account.");

}else{
	$result = queryMysql("SELECT * FROM USER WHERE user_email='$user'");
    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];
   // 	require_once('functions.php');
    	
    	if($action =="Update Product"){
    		update_product($product_id, $category_id,$code,$name,$price,$product_quantity);
    		$added_product_msg = "successfully updated!".$product_id;

    	}else if($action == "Delete Product"){
    		delete_product($product_id);
    		$added_product_msg = "successfully deleted!";
    	}


    include("myAccount.php");




}






?>