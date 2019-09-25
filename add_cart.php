<?php include 'header.php';?>

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


<div>
	<p>Your Cart</p>
	
	</div>