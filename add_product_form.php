<!-- add_product_form.php -->
<?php 
	require_once 'header.php';

	if(!$loggedin){
  
      die("You must <a href='login.php'>log in </a> to see your account.");
  	}
  	else {
  		$result= queryMysql("SELECT * FROM USER WHERE user_email='$user'");	
		$row = mysqli_fetch_array($result);
		$user_id = $row['user_id'];
		$user_type = $row['user_type'];

		if($user_type == 'S'){

		}


	 }

?>



<div class='container'>

	<form action='add_product.php' method='POST' style="text-align:center;border:2px solid grey;width:50%;padding:2em 3em" >
		<center><h4 style='border-bottom:1px solid gray;width:50%'>Add Product Form </h4></center><br/>

		<span style="color:red"><?php echo $error_message; ?></span>
		<label>Product Name:</label>
		<input type='text' name='name' ><br/>
		<label>Product Code:</label>
		<input type='text' name='code' ><br/>
		<label>Product Category:</label>
		<select name='category_id'>
			<option value='1'>Cosmetics</option>
			<option value='2'>School Supplies</option>
			<option value='3'>Household Supplies</option>
		</select><br/>
		<label>Product Price: </label>
		<input type="float" name='price'><br/>
		
		<label>Product Quantity: </label>
		<input type='number' name='prod_quantity'>
		<br/><br/>

		<input type='submit' value='Add Product'>

	</form>

</div>
<center><?php include 'footer.php'; ?></center>


