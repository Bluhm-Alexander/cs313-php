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
		
	if ( !isset($_SESSION["total"]) ) {
		$_SESSION["total"] = 0;
		$_SESSION["totalQty"] = 0;
		for ($i=0; $i< count($items); $i++) {
			$_SESSION["qty"][$i] = 0;
			$_SESSION["amounts"][$i] = 0;
		}
	}
	
	//Add
	if ( isset($_GET["add"]) )
	{
		$i = $_GET["add"];
		$qty = $_SESSION["qty"][$i] + 1;
		$_SESSION["amounts"][$i] = $items[$i][1] * $qty;
		$_SESSION["cart"][$i] = $i;
		$_SESSION["qty"][$i] = $qty;
		$_SESSION["totalQty"] = $_SESSION["totalQty"] + 1;
	}
			
		include('../includes/header.php');
?>
	<head>
		<!-- <link rel = "stylesheet" type = "text/css" href = "morestyle.css"> -->
		<!-- <script src="myscripts.js"></script> -->
		
	</head>
	
	
		</div>
		
		<div id="requirements_div">
			<div class="requirements_button" onclick="expandRequirements()">
				<h3 class="requirements_button_text">Requirements</h3>
			</div>
			<div class="requirements_text">
				<h3>CORE REQUIREMENTS</h3>
				<p>
					Browse Items<br>
					<br>
					On the browse items page, the user sees a list of items they can add to 
					their cart and purchase. Again, the kind of items and the formatting of 
					this page is up to you. <br>
					<br>
					You should provide a button or link to add an item to the cart. Doing so 
					should store that item in some way to the session, and then keep the user 
					on the browse page.<br>
				</p>
			</div>
		</div>
		
		<div class="container">
	
			<div class="main_contents">
				<h1>Prove03: Shopping Cart Browse Items</h1>
				
				<table style="width: 100%">
					<tr>
						<th align="left">Item</th>
						<th align="right">Price</th>
						<th></th>
					</tr>
					<?php for ($x = 0; $x < sizeof($items); $x++) { ?>
						<tr>
							<td><?php echo $items[$x][0];?></td>
							<td align="right">$<?php echo number_format((float)$items[$x][1], 2, '.', ''); ?></td>
							<td><a type="button" href="?add=<?php echo $x; ?>">Add to Cart</a></td>
						</tr>
					<?php
					}
					?>

				</table>
				
<!-- Place Holder -->
				
<!-- End of Place Holder -->
				
				
				<a href="prove03_view.php">View Cart (
				<?php 
					if ( isset($_SESSION["cart"]) ) { 
						echo $_SESSION["totalQty"];
					}
					else {
						echo "0";
					}
						?>)</a>
				
			</div>
			
	
<?php
  include('../includes/footer.php');
?>