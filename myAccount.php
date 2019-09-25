<?php require_once 'header.php'; ?>
<?php 
//create functions


if(!$loggedin){
  
      die("You must <a href='login.php'>log in </a> to see your account.");
  }
  else {

  	$result1 = queryMysql("SELECT * FROM USER WHERE user_email='$user'");
  	$row1 = mysqli_fetch_array($result1);
  	$user_id = $row1['user_id'];
  	$user_type = $row1['user_type'];
  	$user_name = ucwords($row1['user_name']);//capitalize the first letter of the name
  	if($user_name == ''){
  		$user_name = 'Anonymous';
  	}

  	if($user_type =='C'){
  		$message = '<h1>Your Cart</h1>';
  		$user_type_disc = 'Buyer Account';
  		
  	} else{
  		$message="<h1>Your Listed Products</h1><p><a href='add_product_form.php'>Add Product</a></p>";
  		$user_type_disc = 'Seller Account';

  		$result= queryMysql("SELECT * FROM PRODUCT WHERE user_id = '$user_id'");
  		if (!$result)
		{	
			die("Database connection failed." . mysqli_error($connection));
		}
			//COUNT HOW MANY ROW IN THE RESULT SET

			$row_count = $result ->num_rows;
			//	echo 'number of row is '.$row_count .'<br>';

			$products = get_user_product($user_id);
			
  	}

  }

  
?>

<div class='container'>
	<div class='row'>
		<div class='col-sm-2'>
			<img src='https://icons-for-free.com/iconfiles/png/512/add+user+profile+snapchat+icon-1320191291850448587.png' width='200px' height='200px'/>
		</div>
		<div class='col-sm-4' style='padding:40px 20px'>
			<?php echo "<h3>".$user_name. '</h3><br/>';?>
			<?php echo "<p>".$user_type_disc."</p>"; ?>
		
		<a href='edit-account.php'>Edit Your Account Information</a>
		</div>
		

	</div>
	<div class='row'>
		<p><?php echo $message; ?></p>
	</div>

	<!-- show list of product for a seller account--> 
	<span style='color:green;font-size:20px'><?php echo $name." ".$added_product_msg; ?></span>
	<span><?php echo $error_message; ?></span>
	<?php 
		if($user_type == 'S'){
			echo "<table style='width:500px;text-align:center;border-bottom:1px solid lightgrey;'><tr><th>Product ID<th>Product Code</th><th>Category ID</th><th>Product Name</th><th>Unit Price</th><th>Quantity</th></tr>";

			
			foreach($products as $product){
				echo '<tr>';
				echo "<td><a href='edit_product.php?pid=".$product['product_id']."'>".$product['product_id'].'</td><td>'.
					$product['product_code']

				.'</td><td>'.$product['category_id'].'</td><td>'.$product['product_name'].'</td><td>'.$product['unit_price'].'</td><td>'.$product['prod_quantity'];
			}

			echo "</tr></table>";
		}
	//echo $action_type;
	echo $action;
	echo  "compare ".$action == 'Update Product';
	echo $product_id;

	?>




</div>



<center><?php include 'footer.php'; ?></center>



</html>


