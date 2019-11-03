<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();
    include('../includes/header.php');
?>

    <head>
		<link rel = "stylesheet" type = "text/css" href = "morestyle.css">
		<script src="jquery-3.4.1.min.js"></script>
        <script src="databaseHolders.js"></script>
    </head>

    <div class="main_contents">
        <h1>Add/Remove Exercises From Routine</h1>
        <div class="button-container">
            <a class="button-gen" href="fitnessHomeScreen.php">Back to Home Screen</a>
        </div>
        <p>
            Highlight the Exercises you want to Add on the left side. 
            Remove exercises by highlighting the selects on the right side<br>
        </p>
        <table class="framework">
            <tbody>
                <tr class="div-row">
                    <td class="div-left-cell">
                        <form name="display" action="addExerciseToRoutine.php" method="POST" >
                            <select style="width: 100%;" name="exerciseID" size="10" onchange="fillInRepsandSets( 'exercises', this.value )"> 
                                <?php
                                    $statement = $db->prepare("SELECT * FROM exercises");
                                    $statement->execute();
                                    $x = 0;

                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $exercisename = $row['exercisename'];
                                        $exerciseid = $row['exerciseid'];
                                        echo "<option value=\"$exerciseid\">$exercisename</option>";
                                    }
                                ?>
                            </select>
                    </td>
                    <td class="middle-cell">
                        <div class="center-cell">
                            <label for="REPS">Number of Repetitions:</label>
                            <input type="number" name="reps" id="REPS" required/>
                            <label for="SETS">Number of Sets:</label>
                            <input type="number" name="sets" id="SETS" required/>
                            <input type="submit" name="AddExercise" value="Add Exercise to Routine" id="AddExerciseButton"/>
                            </form>
                        </div>
                    </td>
                    <td class="fourth-cell">
                        <form name="display" action="addExerciseToRoutine.php" method="POST" >
                            <select style="width: 100%;" name="routineExerciseID" size="10"> 
                                <?php
                                    $statement = $db->prepare("select y.routineexerciseid, * from exercises 
                                                                inner join (select * from routineexercises where routineid = :routineid) as y 
                                                                on exercises.exerciseid = y.exerciseid;");
                                    $statement->bindValue(':routineid', $_SESSION['RoutineEdit']);
                                    $statement->execute();
                                    $x = 0;

                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $exercisename = $row['exercisename'];
                                        $exerciseid = $row['routineexerciseid'];
                                        echo "<option value=\"$exerciseid\">$exercisename</option>";
                                    }
                                ?>
                            </select>
                    </td>
                    <td class="middle-cell">
                        <div class="center-cell">
                            <input type="submit" name="RemoveExercise" value="Remove Exercise From Routine" id="RemoveExerciseButton"/>
                            </form>
                        </div>
                    </td>
                </tr>
            <tbody>
        </table>
        <?php
        if(isset($_POST['AddExercise'])){
            try
            {
                $db = get_db();
                $statement = $db->prepare("SELECT MAX(routineexerciseid) FROM routineexercises");
                $statement->execute();
                $LastID;
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    $LastID = $row['max'];
                }
                $newID = intval($LastID) + 1;
                //echo $newID;
                $query = "INSERT INTO routineexercises (routineexerciseid, routineid, exerciseid, defaultreps, defaultsets)
                    VALUES (:routineexerciseid, :routineid, :exerciseid, :defaultreps, :defaultsets)";
                $statement = $db->prepare($query);

                //Bind Variables
                $statement->bindValue(':routineexerciseid', $newID, PDO::PARAM_INT);
                $statement->bindValue(':routineid', $_SESSION['RoutineEdit'], PDO::PARAM_INT);
                $statement->bindValue(':exerciseid', $_POST['exerciseID'], PDO::PARAM_INT);
                $statement->bindValue(':defaultreps', $_POST['reps'], PDO::PARAM_INT);
                $statement->bindValue(':defaultsets', $_POST['sets'], PDO::PARAM_INT);

                $statement->execute();
                echo "<meta http-equiv='refresh' content='0'>";
            }
            catch (Exception $ex)
            {
                // Please be aware that you don't want to output the Exception message in
                // a production environment
                echo "<div class=\"error\">Error: Not a Valid Selection</div>";
                die();
            }
        }

        if(isset($_POST['RemoveExercise'])){
            try {
                $statement = $db->prepare("DELETE FROM routineexercises WHERE routineexerciseid = :routineexerciseid");
                //Bind Variables
                $statement->bindValue(':routineexerciseid', $_POST['routineExerciseID']);
                $statement->execute();
                echo "<meta http-equiv='refresh' content='0'>";
            }
            catch (Exception $e) {
                echo "<div class=\"error\">Could Not Delete Row</div>";
                //$e->getMessage();
                exit();
            }
        }
    ?>
    </div>