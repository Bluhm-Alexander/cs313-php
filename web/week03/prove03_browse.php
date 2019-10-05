<?php
		session_start();
		  
		$_SESSION["shoppingCart"] = array("None", 0.00);
		  
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
				
				<a href="prove03_view">View Cart (<?php  ?>)</a>
				
				<table style="width: 100%">
					<tr>
						<th>Item</th>
						<th>Price</th>
						<th></th>
					</tr>
					<?php for ($x = 0; $x < sizeof($items); $x++) {
						echo "<tr><td>".$items[$x][0]."</td><td>".$items[$x][1]."</td><td><button type=\"button\">Click Me!</button></td></tr>\n";
					}
					?>
				</table>
				
			</div>
			
	
<?php
  include('../includes/footer.php');
?>