<html>
	<head>
		<title>Alex's Personal Website</title>
		<?php
			if(getcwd() != "/app/web") {
				chdir("..");
			}
			echo '<link rel = "stylesheet" type = "text/css" href = "style_sheet.css">';
		?>
			
	</head>
	<body>
		<div class="header">
			<h1 class="site_header_style">CS-313 Web Engineering II Classwork</h1>
			<h2 class="site_header_style">By Alexander Bluhm</h2>
		</div>
		
		<!-- Main Body of the page -->
		
		<div class="container">
		
		<!-- Navigation Pane -->
			<div class="side_content">
				<?php
					$directory = getcwd();
					$directory .= 'includes/nav.php';
					include($directory); 
					echo $directory;
				?>
			</div>
			<!-- content specific to navigated pages will be 
			after this point contained in other html files -->
			
			<div class="main_contents">