<?php
    session_start();

    require "dbConnect.php";
    include('../includes/header.php');
?>

    <head>
		<link rel = "stylesheet" type = "text/css" href = "morestyle.css">
		<script src="jquery-3.4.1.min.js"></script>
        <script src="databaseHolders.js"></script>
    </head>

    <div class="main_contents">
        <h1>Input New Exercise</h1>
        
        <div class="button-container">
            <a class="button-gen" href="fitnessHomeScreen.php">Back to Home Screen</a>
        </div>
        
        <div class="form-group">
            <form name="display" action="addExercise.php" method="POST" >
                <ul>
                <li><label for="ExerciseName">Exercise Name:</label></li>
                <li><input type="text" name="exercisename" id="ExerciseName" required/></li>
                <li><label for="REPS">Number of Repetitions:</label></li>
                <li><input type="number" name="reps" id="REPS" required/></li>
                <li><label for="SETS">Number of Sets:</label></li>
                <li><input type="number" name="sets" id="SETS" required/></li>
                <li><label for="CALORIES">Number Calories Burned By Exercise:</label></li>
                <li><input type="number" name="burnedCalories" id="CALORIES" required/></li>
                <li><label for="comment">Exercise Description:</label></li>
                <li><textarea class="form-control" rows="5" id="comment" name="description" cols="100" required></textarea></li>
                <li><input type="submit" name="submit" value="Add Exercise"/></li>
                </ul>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            try
            {
                $db = get_db();
                $statement = $db->prepare("SELECT MAX(exerciseid) FROM exercises");
                $statement->execute();
                $LastID;
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    $LastID = $row['max'];
                }
                $newID = intval($LastID) + 1;
                //echo $newID;
                $query = "INSERT INTO exercises (exerciseid, exercisename, description, defaultreps, burnedcalories, defaultsets)
                    VALUES (:exerciseID, :exerciseName, :Description, :defaultReps, :burnedCalories, :defaultSets)";
                $statement = $db->prepare($query);

                //Bind Variables
                $statement->bindValue(':exerciseID', $newID, PDO::PARAM_INT);
                $statement->bindValue(':exerciseName', $_POST['exercisename'], PDO::PARAM_STR);
                $statement->bindValue(':Description', $_POST['description'], PDO::PARAM_STR);
                $statement->bindValue(':defaultReps', $_POST['reps'], PDO::PARAM_INT);
                $statement->bindValue(':defaultSets', $_POST['sets'], PDO::PARAM_INT);
                $statement->bindValue(':burnedCalories', $_POST['burnedCalories'], PDO::PARAM_INT);

                $statement->execute();
                header("location: fitnessHomeScreen.php");
            }
            catch (Exception $ex)
            {
                // Please be aware that you don't want to output the Exception message in
                // a production environment
                echo "Error with DB. Details: $ex";
                die();
            }
            
        }
    ?>