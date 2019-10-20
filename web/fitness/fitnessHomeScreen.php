<?php
    require "dbConnect.php";
    $db = get_db();

    include('../includes/header.php');
?>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "morestyle.css">
		<!-- <script src="myscripts.js"></script> -->
		
	</head>

		</div>
		
		<div id="requirements_div">
			<div class="requirements_button" onclick="expandRequirements()">
				<h3 class="requirements_button_text">Requirements</h3>
			</div>
			<div class="requirements_text">
				<h3>CORE REQUIREMENTS</h3>
				<p>
					Read contents of databse
				</p>
			</div>
		</div>
		
		<div class="container">
	
			<div class="main_contents">
			
                <div class="framework">
                    <div class="div-row">
                        <div class="div-cell">
                            <div>
                                <select size="5">
                                    <?php
                                        $statement = $db->prepare("SELECT username FROM users");
                                        $statement->execute();
                                        
                                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                                        {
                                            // The variable "row" now holds the complete record for that
                                            // row, and we can access the different values based on their
                                            // name
                                            $user = $row['username'];
                                            echo "<option>$user</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="div-cell">
                            <div>
                                blah
                            </div>
                        </div>
                        <div class="div-cell">
                            <div>
                                blah
                            </div>
                        </div>
                    </div>
                </div>
			
            </div>
            
<?php
  include('../includes/footer.php');
?>
