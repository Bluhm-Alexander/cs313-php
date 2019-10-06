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
					Confirmation page<br>
					<br>
					After completing the purchase from the checkout page, the user 
					is shown a confirmation page. It should display all the items 
					they have just purchased as well as the address to which it 
					will be shipped.<br>
					<br>
					Make sure to check for malicious injection, especially from 
					free-entry fields like the address.<br>
				</p>
			</div>
		</div>
		
		<div class="container">
	
			<div class="main_contents">
				<h1>Prove03: Confirmation</h1>

				<a href="prove03_browse.php"><- Go Back to Browse Items</a><br>
				<p>
					<br>
					Address 1: &nbsp; <?php echo $_POST["address1"]; ?><br>
					Address 2: &nbsp; <?php echo $_POST["address2"]; ?><br>
					Zip Code: &nbsp; <?php echo $_POST["zip"]; ?><br>
					City: &nbsp; <?php echo $_POST["city"]; ?><br>
					State: &nbsp; <?php echo $_POST["state"]; ?><br>
					<br>
				</p>
				
				<h2>Items Being Shipped</h2>
				
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
				
			</div>
	
<?php
	//reset Cart
	unset($_SESSION["qty"]); 
	unset($_SESSION["amounts"]);
	unset($_SESSION["total"]);
	unset($_SESSION["cart"]);
	unset($_SESSION["totalQty"]);
	
	include('../includes/footer.php');
?>