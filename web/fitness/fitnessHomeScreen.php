<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();

    //function to grab routine information
	if ( isset($_GET["add"]) )
	{
		$i = (int)$_GET["routine"];
		$_SESSION["routineid"] = $i;
	}

    include('../includes/header.php');
?>

    <head>
		<link rel = "stylesheet" type = "text/css" href = "morestyle.css">
		<script src="jquery-3.4.1.min.js"></script>
        <script src="databaseHolders.js"></script>
    </head>

    <?php
        include('db-fitnessRetrieve.php');
    ?>

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
			<h1>Fitness Application</h1>
            <h2>Available Exercises</h2>
                <table class="framework">
                    <tbody>
                        <tr class="div-row">
                            <td class="div-left-cell">
                                <!-- <select style="width: 100%;" size="5" onchange="location = this.value;"> -->
                                <select style="width: 100%;" size="10" onchange="getExerciseInformation( 'exercises', this.value )"> 
                                    <?php
                                        $statement = $db->prepare("SELECT * FROM exercises");
                                        $statement->execute();
                                        $x = 0;
                                        
                                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                                        {
                                            // The variable "row" now holds the complete record for that
                                            // row, and we can access the different values based on their
                                            // name
                                            $exercisename = $row['exercisename'];
                                            $exerciseid = $row['exerciseid'];
                                            /*echo "<option value=\"?routine=$routineid\">$routinename</option>";*/
                                            echo "<option value=\"$x\">$exercisename</option>";
                                            //echo "<option value=\"?add=$x\">Add to Cart</option>";
                                            $x++;
                                        }
                                    ?>
                                </select>
                            </td>
                            <td class="middle-cell">
                                <div class="center-cell">
                                    <button onclick="window.location.href = 'addExercise.php';">Add An Exercise</button>
                                </div>
                            </td>
                            <td class="right-cell">
                                <div class="div-right-cell">
                                    <h4 id="exerciseName">Workout Description</h4>
                                    <p id="exerciseDescription">Workout desrciption</p>
                                </div>
                            </td>
                            <td class="fourth-cell">
                                <table style="width: 100%">
                                    <tr>
                                        <td>
                                            Repetition:
                                        </td>
                                        <td id="exerciseReps">
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sets:
                                        </td>
                                        <td id="exerciseSets">
                                            0
                                        </td>
                                    </tr>
                                        <td>
                                            Calories Burned:
                                        </td>
                                        <td id="exerciseCalories">
                                            0
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
			
            </div>
            
<?php
  include('../includes/footer.php');
?>
