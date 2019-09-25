<!-- edit_product.php -->
<?php include 'header.php'; ?>

<?php 
	if(!$loggedin){
  
      die("You must <a href='login.php'>log in </a> to see your account.");
  }
  else {
  	$result1 = queryMysql("SELECT * FROM USER WHERE user_email='$user'");
  	$row1 = mysqli_fetch_array($result1);
  	
  	$user_id = $row1['user_id'];
  //	echo $user_id;
  	$result= queryMysql("SELECT * FROM PRODUCT WHERE user_id = '$user_id'");
	if (!$result)
	{	
		die("Database connection failed." . mysqli_error($connection));
	}
	
	if(isset($_GET['pid']) || $_GET['pid'] !== '')
	{
		$product_id = $_GET['pid'];
		//COUNT HOW MANY ROW IN THE RESULT SET

		$row_count = $result ->num_rows;
		$action_type = 'update_product';
		$product = get_product($product_id);
		
	}

  }

?>

<div class='container'>

	<form action="update_product.php" method='POST' style="text-align:center;border:2px solid grey;width:50%;padding:2em 3em" >
		<center><h4 style='border-bottom:1px solid gray;width:50%'>Update Product Form </h4></center><br/>

		<span><?php echo $error_message; ?></span>
		<label>Product Id: </label>
		<input type="number" name="product_id" value="<?php echo $product_id ?>" >

		<label>Product Name:</label>
		<input type='text' name='name' value='<?php echo htmlspecialchars($product['product_name']); ?>' ><br/>
		<label>Product Code:</label>
		<input type='text' name='code' value="<?php echo htmlspecialchars($product['product_code']); ?>"  ><br/>
		<label>Product Category:</label>
		<select name='category_id' value="<?php echo $product['category_id']; ?>" >
			<option value='1'>Cosmetics</option>
			<option value='2'>School Supplies</option>
			<option value='3'>Household Supplies</option>
		</select><br/>
		<label>Product Price: </label>
		<input type="float" name='price'  ><br/>
		
		<label>Product Quantity: </label>
		<input type='number' name='prod_quantity' >
		<br/><br/>
		
		 <label>&nbsp;</label>
		<!--  <button type='button' name="submit" value='update'>Update Product</button>
		 <button type='button' name="submit" value='delete'>Delete Product</button> -->

		<input type='submit' name='action' value='Update Product'>
		<input type='submit' name='action' Value='Delete Product'>

	</form>

</div>
<center><?php include 'footer.php'; ?></center>
