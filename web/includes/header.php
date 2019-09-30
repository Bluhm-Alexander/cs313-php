<html>
	<head>
		<title>Alex's Personal Website</title>
		<?php
			$flag = "";
			if(getcwd() != "/app/web") {
				$flag = "../";
			}
		?>
		<link rel = "stylesheet" type = "text/css" href = "<?php echo $flag; ?>style_sheet.css">
		<script src="<?php echo $flag; ?>interactivityScripts.js"></script>
	</head>
	<body>
		<div class="header">
			<h1 class="site_header_style">CS-313 Web Engineering II Classwork</h1>
			<h2 class="site_header_style">By Alexander Bluhm</h2>
		</div>
		
		<ul class="nav_bar">
			<li class="nav_items"><a class="nav_item_links" href="<?php echo $upOne; ?>index.php">Home</a></li>
			<li class="nav_items"><a class="nav_item_links" href="<?php echo $upOne; ?>assignmentsList.php">Assignments</a></li>
		</ul>
		
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
			