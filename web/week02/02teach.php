<?php
  include('../includes/header.php');
?>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "morestyle.css">
		<script src="myscripts.js"></script>
	</head>
	<div class="main_contents">
		<h1>Teach02: Team Activity</h1>

		<div id="div1" class="hoverable">Sample Text</div>
	
		<form>
			Color: <input type="text" id="color-code" maxlength="6"><br>
			<button type="button" onclick="changeColor()">Change Color</button>
		</form>
		
		<div id="div2" class="hoverable">Sample Text</div>
		<div id="div3" class="hoverable">Sample Text</div>
		
		<button type="button" id="mybutton" onclick="whenClicked()">Click Me</button>
	</div>
	
<?php
  include('../includes/footer.php');
?>