<?php
  include('../includes/header.php');
?>
	<head>
		<!-- <link rel = "stylesheet" type = "text/css" href = "morestyle.css">
		<script src="myscripts.js"></script> -->
	</head>
	
	
		</div>
		
		<div id="requirements_div">
			<div class="requirements_button" onclick="expandRequirements()">
				<h3 class="requirements_button_text">Requirements</h3>
			</div>
			<div class="requirements_text">
				<h3>CORE REQUIREMENTS</h3>
				<p>
					Create an HTML form that contains the following components:<br>
					<br>
					Name (text)<br>
					Email (text)<br>
					<br>
					Major (radio button) with the following options:<br>
					Computer Science<br>
					Web Design and Development<br>
					Computer information Technology<br>
					Computer Engineering<br>
					Comments (text area)<br>
					<br>
					You do not need to style this HTML form per se, but each input should be labeled and separated from each other.<br>
					<br>
					Create a PHP script to handle this form, so that when the form is submitted, it captures the form data and produces a web page that displays:<br>
					The user's name<br>
					Their email address, with a "mailto:" link for the email address<br>
					Their major<br>
					Their comments<br>
					<br>
					Again, this data need not be styled, but it should be labeled and separated from each other.<br>
					<br>
					Use the POST method for your form submission.<br>
					<br>
					Add to your form a checkbox list for the continents the user has visited with the following options: <br>
					North America <br>
					South America<br>
					Europe<br>
					Asia<br>
					Australia<br>
					Africa<br>
					Antarctica<br>
					<br>
					Then, modify your PHP page to read and display this list.<br>
				</p>
			</div>
		</div>
		
		<div class="container">
	
			<div class="main_contents">
				<h1>Teach03: Team Activity Form Submission</h1>

				<form action="results.php" method="post" id="usrform">
					Name: &nbsp; <input type="text" name="name"><br>
					E-mail: &nbsp; <input type="text" name="email"><br>
					Major: <br>
					<input type="radio" name="major" value="Computer Science"> Computer Science<br>
					<input type="radio" name="major" value="Web Design and Development"> Web Design and Development<br>
					<input type="radio" name="major" value="Computer information Technology"> Computer information Technology<br>
					<input type="radio" name="major" value="Computer Engineering"> Computer Engineering<br>
					<br>
					Continents You Have Visited:<br>
					<br>
					<input type="checkbox" name="continents[]" value="North America"> North America<br>
					<input type="checkbox" name="continents[]" value="South America"> South America<br>
					<input type="checkbox" name="continents[]" value="Europe"> Europe<br>
					<input type="checkbox" name="continents[]" value="Asia"> Asia<br>
					<input type="checkbox" name="continents[]" value="Australia"> Australia<br>
					<input type="checkbox" name="continents[]" value="Africa"> Africa<br>
					<input type="checkbox" name="continents[]" value="Antarctica"> Antarctica<br>
					<br>
					Comments: &nbsp; <textarea name="comments" form="usrform" style="height:400px; width:400px">Enter text here...</textarea>
					<br>
					<input type="submit">
				</form>
			</div>
			
	
<?php
  include('../includes/footer.php');
?>