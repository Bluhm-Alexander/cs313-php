<?php
  include('includes/header.php');
?>

</div>
		
		<div id="requirements_div">
			<div class="requirements_button" onclick="expandRequirements()">
				<h3 class="requirements_button_text">Requirements</h3>
			</div>
			<div class="requirements_text">
				<p>
					Professional look and feel<br>
					<br>
					Do not use an HTML generator/layout program (e.g., DreamWeaver, FrontPage, Visual Studio designer tools). 
					Please write the HTML for this page from scratch. You are, however, welcome to use jQuery, 
					or Bootstrap, or other libraries if you would like.<br>
					<br>
					Put all styles in an external stylesheet. (No inline styles.)<br>
					<br>
					At least one image<br>
					<br>
					Something dynamic (e.g., mouse-overs, menus, on-click, on-change, etc.)<br>
					<br>
					Include reasonable colors, images, etc. to show your creativity and 
					personality (but don't forget to keep it somewhat professional).<br>
					<br>
					No run-time errors<br>
					<br>
					Use PHP to do something on the server.<br>
					<br>
					While most of this assignment is about reviewing client side Web development, 
					you ought to make your page a .php file, and do at least one thing on the server (i.e. inside tags). 
					This could be as simple as displaying the server time, or another common option is to use a php include to 
					include the same header or navbar on each page. The exact things you do are up to you.
				</p>
			</div>
		</div>
		
		<div class="container">

			<div class="main_contents">
				<h1>Homepage</h1>
				
				<p>My name is Alexander Bluhm and this is my website for CS313: Web Engineering II</p>
				
				<img src="download.jfif" alt="Genesis Motherboard" width="560">
				
				<p>I like low level programming. Particularly I really like C and some assembly. 
				I like to make things as small and as simple as possible. I also really like exotic 
				kinds of computing, well exotic to me at least. I have a Sega Genesis Console and I've 
				spent the last couple of years learning everything I can about it. So far I've learned 
				about the dynamic memory controller, the video display processor and the almighty 
				Motorola 68000 itself. The 68k line of processors are incredibly fascinating to me. 
				I've never seen a processor that has such clean assembly language. It's actually 
				not that hard to program something in Assembly on the 68k. Not only that but the 68k 
				has this incredibly quiet potential about it, as if it's daring you to squeeze out 
				the last bit of performance it can muster.</p>
				
				<iframe width="560" height="315" align="right" src="https://www.youtube.com/embed/Ji6TuFopkcg" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
				</iframe>
				<p> I'm in the process of building my own game engine for the Sega Genesis. I'm building 
				a Secret of Mana style game for the console which among other things will demonstrate the 
				console's full color potential because for some reason a lot of developers back in the day 
				didn't cell base their color or utilize some of rthe hardware features to make a more 
				appealing color palette.</p>
				
				<p>The story of the game will take place in modern day. The story will be about the main 
				the main character Gage who lives on the east coast but boards a plane to spend the summer
				with his cousin in California. While in California an alien space ship parks itself in 
				Earth's orbit. It then scrambles all of earth's communications and for some reason 
				everyone on earth gets 100IQ points smarter. Everything becomes chaos and Gage only 
				wants to get home. While traveling home you pass through several insane towns and cities. 
				One town worships the Motorola 68000, another town has been taken over by two rivaling
				sandwich companies and the delivery drivers are worshipped as Idols. The entire state 
				of Arizona has been turned into a lush rain forest. As the story progresses you learn 
				more about why the horrifying reason this is all happening and how it was a massive 
				accident.</p>
				
				<p>I'm trying to give back to the Sega Genesis Developer Community because they are 
				really cool and they have helped me out a ton. In order to help other people I'm in the
				process of writing an Asteroids game for the Genesis with lots of comments that help 
				people know whats going on.</p>
				
				<p>You can check out the Github Page here: <a href="https://github.com/Bluhm-Alexander/asteroidsSegaGenesis">Link To GitHub</a>
			</div>
				
<?php
  include('includes/footer.php');
?>