<?php
	session_start();
	
	$items = array
		(
			array("Toilet Paper", 3.25),
			array("Flour", 2.00),
			array("Apples", 4.15),
			array("Oranges", 2.60),
			array("Baking Mix", 1.15)
		);
	
	include('../includes/header.php');
?>

</div>
		
		<div id="requirements_div">
			<div class="requirements_button" onclick="expandRequirements()">
				<h3 class="requirements_button_text">Requirements</h3>
			</div>
			<div class="requirements_text">
				<h3>CORE REQUIREMENTS</h3>
				<p>
					Checkout<br>
					<br>
					The checkout page should ask the user for the different components of 
					their address. (No credit card or other purchase information is 
					collected, only an address.)<br>

					It should have the option to complete the purchase or return to the cart.<br>
				</p>
			</div>
		</div>
		
		<div class="container">
		
			<div class="main_contents">
				<h1>Prove03: Shopping Cart Check Out Items</h1>
				
				<a href="prove03_view.php">Back to View Cart</a>
				
				<h2>Enter Address</h2>
				
				<table style="width: 100%">
					<tr>
						<th align="left">Item</th>
						<th align="right">Quantity</th>
						<th align="right">amount</th>
					</tr>
					<?php
						$total = 0;
						foreach ( $_SESSION["cart"] as $i ) {
					?>
					<tr>
						<td><?php echo($items[$_SESSION["cart"][$i]][0]); ?></td>
						<td align="right"><?php echo($_SESSION["qty"][$i]); ?></td>
						<td align="right">$<?php echo(number_format((float)$_SESSION["amounts"][$i], 2, '.', '')); ?></td>
					</tr>
					<?php
					$total = $total + $_SESSION["amounts"][$i];
					}
					$_SESSION["total"] = $total;
					?>
				</table>
				
				<p>Total : <?php echo(number_format((float)$total, 2, '.', '')); ?></p>

<?php
  include('../includes/footer.php');
?>