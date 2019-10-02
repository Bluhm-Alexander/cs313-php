<?php 
	$upOne = "";
	if(getcwd() != "/app/web") {
		$upOne = "../";
	}
	//echo $upOne;
?>

<a href="<?php echo $upOne; ?>index.php">Home</a>
<p>Assignments</p>
<ul class="nav_parent_tree">
	<li>Week01:</li>
		<ul>
			<li><a href="<?php echo $upOne; ?>week01/hello.php">Prove01: Hello World</a></li>
		</ul>
	<li>Week02:</li>
		<ul>
			<li><a href="<?php echo $upOne; ?>week02/02teach.php">Teach02: Team Activity</a></li>
			<li><a href="<?php echo $upOne; ?>index.php">Prove02: Homepage</a></li>
		</ul>
	<li>Week03:</li>
		<ul>
			<li><a href="<?php echo $upOne; ?>week03/03teach.php">Teach03: Team Activity</a></li>
		</ul>
</ul>