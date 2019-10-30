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
        <h1>

        <ul>
            <form name="display" action="addExercise.php" method="POST" >
                <li>Exercise Name:</li>
                <li><input type="text" name="exercisename" /></li>
                <li>Description:</li>
                <li><input type="textbox" name="description"></li>
                <li><input type="submit" name="submit" /></li>
            </form>
        </ul>
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
                echo $newID;
                $query = "INSERT INTO exercises (exerciseid, exercisename, description, defaultreps, burnedcalories, defaultsets)
                    VALUES (:exerciseID, :exerciseName, :Description, 10, 600, 4)";
                $statement = $db->prepare($query);

                //Bind Variables
                $statement->bindValue(':exerciseID', $newID, PDO::PARAM_INT);
                $statement->bindValue(':exerciseName', $_POST['exercisename'], PDO::PARAM_STR);
                $statement->bindValue(':Description', $_POST['description'], PDO::PARAM_STR);

                $statement->execute();
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