<?php
  include('../includes/header.php');
?>
	<head>
		<!-- <link rel = "stylesheet" type = "text/css" href = "morestyle.css">
		<script src="myscripts.js"></script> -->
	</head>
	<div class="main_contents">
		<h1>Teach03: Team Activity Form Submission Results</h1>

		
		Name: &nbsp; <?php echo $_POST["name"]; ?><br>
		E-mail: &nbsp; <?php echo $_POST["email"]; ?><br>
		Major: &nbsp; <?php echo $_POST["major"]; ?><br>
		Comments: &nbsp; <?php echo $_POST["comments"]; ?><br>
			
	</div>
	
<?php
  include('../includes/footer.php');
?>