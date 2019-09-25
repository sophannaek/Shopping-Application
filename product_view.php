<!-- product_view.php --> 

<?php require_once 'header.php';

	
	$products = get_products();



?>


</div>

<div class='container'>
	<h5>See All the Listings</h5>
	<?php foreach($products as $product): ?>
		<div class='card' style="height:150px;text-align:left;border-bottom:1px solid lightgray">
			<div class='col-sm-4'>
				<p>image</p>
			</div>
			<div class='col-sm-8'>
				<?php echo '<h5>'.$product['product_name'].'</h5>'; ?>
				<?php echo '<p>'.'$'.$product['unit_price'].'</p>'; ?>
				<?php echo '<p>'.$product['product_id'].'</p>'; ?>
				<?php echo "<a href='add_cart.php?pid=".$product['product_id']."'>"."Add to Cart</a>" ;?>

			</div>
			
		</div>
	<?php endforeach; ?>

</div>


<center><?php include 'footer.php'; ?></center>
