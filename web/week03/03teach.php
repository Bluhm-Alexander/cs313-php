<?php
  include('../includes/header.php');
?>
	<head>
		<!-- <link rel = "stylesheet" type = "text/css" href = "morestyle.css">
		<script src="myscripts.js"></script> -->
	</head>
	<div class="main_contents">
		<h1>Teach03: Team Activity Form Submission</h1>

		<form action="results.php" method="post">
			Name: &nbsp; <input type="text" name="name"><br>
			E-mail: &nbsp; <input type="text" name="email"><br>
			Major: <br>
			<input type="radio" name="major" value="Computer Science"> Computer Science<br>
			<input type="radio" name="major" value="Web Design and Development"> Web Design and Development<br>
			<input type="radio" name="major" value="Computer information Technology"> Computer information Technology<br>
			<input type="radio" name="major" value="Computer Engineering"> Computer Engineering<br>
			Comments: &nbsp; <input type="text" name="comments"><br>
			
			<input type="submit">
		</form>
	</div>
	
<?php
  include('../includes/footer.php');
?>