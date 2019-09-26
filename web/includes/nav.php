<?php 
	$upOne = "";
	if(getcwd() != "/app/web") {
		$upOne = "../";
	}
	echo $upOne;
?>

<a href="index.php">Home</a>
<p>Assignments</p>
<ul class="nav_parent_tree">
	<li>Week01:</li>
		<ul>
			<li><a href="<?php echo $upOne; ?>/week01/hello.php">Prove01: Hello World</a></li>
		</ul>
	<li>Week02:</li>
		<ul>
			<li><a href="<?php echo $upOne; ?>week02/02teach.php">Teach02: Team Activity</a></li>
			<li><a href="<?php echo $upOne; ?>week02/02prove.php">Prove02: Homepage</a></li>
		</ul>
</ul>