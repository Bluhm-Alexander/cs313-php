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
	
	//reset cart
	if ( isset($_GET['reset']) )
	{
		if ($_GET["reset"] == 'true')
		{
			unset($_SESSION["qty"]); 
			unset($_SESSION["amounts"]);
			unset($_SESSION["total"]);
			unset($_SESSION["cart"]);
			unset($_SESSION["totalQty"]);
		}
	}
	
	//remove item
	if ( isset($_GET["remove"]) )
	{
		$i = $_GET["remove"];
		$qty = $_SESSION["qty"][$i];
		$qty--;
		$_SESSION["qty"][$i] = $qty;
		$_SESSION["totalQty"] = $_SESSION["totalQty"] - 1;
		
		if ($qty == 0)
		{
			$_SESSION["amounts"][$i] = 0;
			unset($_SESSION["cart"][$i]);
		}
		if ($_SESSION["totalQty"] <= 0) {
			unset($_SESSION["totalQty"]);
		}
		else
		{
			$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
		}
	}
	
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
					View Cart<br>
					<br>
					Your browse page should contain a link to view the cart. 
					On the view cart page, the user can see all the items 
					that are in their cart. Provide a way to remove individual 
					items from the cart.<br>
					<br>
					The view cart page should have a link to return to the browse 
					page for more shopping and a link to continue to the checkout 
					page.<br>
				</p>
			</div>
		</div>
		
		<div class="container">
	
			<div class="main_contents">
				<h1>Prove03: Shopping Cart View Items</h1>
				
				<a href="prove03_browse.php">Back to Browse</a>
				
				<h2>Shopping Cart</h2>
				
				<?php
					if ($_SESSION["totalQty"] == 0) {
						echo "<h3>No Items in Cart</h3>";
					}
					else {
				?>
				<a href="?reset=true">Reset Cart</a>
				<table style="width: 100%">
					<tr>
						<th align="left">Item</th>
						<th align="right">Quantity</th>
						<th align="right">amount</th>
						<th></th>
					</tr>
					<?php
						$total = 0;
						foreach ( $_SESSION["cart"] as $i ) {
					?>
					<tr>
						<td><?php echo($items[$_SESSION["cart"][$i]][0]); ?></td>
						<td align="right"><?php echo($_SESSION["qty"][$i]); ?></td>
						<td align="right">$<?php echo(number_format((float)$_SESSION["amounts"][$i], 2, '.', '')); ?></td>
						<td><a href="?remove=<?php echo($i); ?>">Remove from cart</a></td>
					</tr>
					<?php
					$total = $total + $_SESSION["amounts"][$i];
					}
					$_SESSION["total"] = $total;
					?>
				</table>
				
				<p>Total : <?php echo(number_format((float)$total, 2, '.', '')); ?></p>
				
				<a href="prove03_checkout.php">Checkout</a>
				
				<?php
					}
				?>
				
			</div>

<?php
  include('../includes/footer.php');
?>