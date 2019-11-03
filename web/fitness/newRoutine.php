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
        <h1>Input New Routine</h1>
        
        <div class="button-container">
            <a class="button-gen" href="fitnessHomeScreen.php">Back to Home Screen</a>
        </div>
        
        <div class="form-group">
            <form name="display" action="newRoutine.php" method="POST" >
                <ul>
                <li><label for="RoutineName">Routine Name:</label></li>
                <li><input type="text" name="routinename" id="ExerciseName" required/></li>
                <li><label for="RoutineDescription">Routine Description:</label></li>
                <li><textarea class="form-control" rows="5" id="RoutineDescription" name="description" cols="100" required></textarea></li>
                <li><input type="submit" name="submit" value="Add Routine"/></li>
                </ul>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            try
            {
                $db = get_db();
                $statement = $db->prepare("SELECT MAX(routineid) FROM routines");
                $statement->execute();
                $LastID;
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    $LastID = $row['max'];
                }
                $newID = intval($LastID) + 1;
                //echo $newID;
                $query = "INSERT INTO routines (routineid, routinename, description)
                    VALUES (:routineid, :routinename, :Description)";
                $statement = $db->prepare($query);

                //Bind Variables
                $statement->bindValue(':routineid', $newID, PDO::PARAM_INT);
                $statement->bindValue(':routinename', $_POST['routinename'], PDO::PARAM_STR);
                $statement->bindValue(':Description', $_POST['description'], PDO::PARAM_STR);

                $statement->execute();
                header("location: addExerciseToRoutine.php");
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