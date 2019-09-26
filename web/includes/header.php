<html>
	<head>
		<title>Alex's Personal Website</title>
		<?php
			$flag = 0;
		
			if(getcwd() != "/app/web") {
				//chdir("..");
				$flag = 1;
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
					//$directory = getcwd();
					//$directory .= '/includes/nav.php';
					$directory = '/app/web/includes/nav.php';
					include($directory); 
					//echo $directory;
					//echo '\n';
					//echo getcwd();
				?>
			</div>
			<!-- content specific to navigated pages will be 
			after this point contained in other html files -->
			
			<div class="main_contents">