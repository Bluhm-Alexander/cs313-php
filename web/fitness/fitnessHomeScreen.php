<?php
    session_start();

    $_SESSION["routineEdit"];
    require "dbConnect.php";
    $db = get_db();

    //function to grab routine information
    //OLD
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
		
		
		<div class="container">
	
			<div class="main_contents">
            
            <div class="button-container">
                <a class="button-gen" href="?logout"> Log Out </a>
            </div>
            
            
            <h1>Fitness Application</h1>
            <h2>Available Exercises</h2>
    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! For Exercise Table !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
                <table class="framework">
                    <tbody>
                        <tr class="div-row">
                            <td class="div-left-cell">
                                <!-- <select style="width: 100%;" size="5" onchange="location = this.value;"> -->
                                <form action="#" method="post" id="exerciseRemove">
                                    <select style="width: 100%;" name="exerciseID" size="10" onchange="getExerciseInformation( 'exercises', this.value )"> 
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
                                    <input type="submit" name="exercisesubmit" value="Delete Row" id="DeleteExerciseButton"/>
                                    </form>
                                    <br>
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
                <?php
                if(isset($_POST['exercisesubmit'])){
                    global $db;
                    try{
                        $statement = $db->prepare("DELETE FROM exercises WHERE exerciseid = :ExerciseID");
                        //Bind Variables
                        $statement->bindValue(':ExerciseID', $_POST['exerciseID']);
                        $statement->execute();
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    catch (Exception $e) {
                        echo "<div class=\"error\">Could Not Delete Row: Someone else is using that exercise</div>";
                        //$e->getMessage();
                        exit();
                    }
                }
                ?>
    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! For Public Routines And Routine Exercises !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
                <h1>Public Routines</h1>
                <table class="framework">
                    <tbody>
                        <tr class="div-row">
                            <td class="div-left-cell">
                                <!-- <select style="width: 100%;" size="5" onchange="location = this.value;"> -->
                                <form action="#" method="post" id="routineRemove">
                                    <select style="width: 100%;" name="RoutineID" size="10" onchange="getRoutineInformation( 'routines', this.value )"> 
                                        <?php
                                            $statement = $db->prepare("SELECT * FROM routines");
                                            $statement->execute();
                                            $x = 0;

                                            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                                            {
                                                $routinename = $row['routinename'];
                                                $routineid = $row['routineid'];
                                                echo "<option value=\"$routineid\">$routinename</option>";
                                            }
                                        ?>
                                    </select>
                                
                            </td>
                            <td class="middle-cell">
                                <div class="center-cell">
                                    <input type="submit" name="routineRemove" value="Delete Row" id="DeleteExerciseButton"/>
                                    <br>
                                    <input type="submit" name="routineEdit" value="Edit a Routine" id="RoutineEditButton"/>
                                    </form>
                                    <button onclick="window.location.href = 'newRoutine.php';">Add A Routine</button>
                                </div>
                            </td>
                            <td class="right-cell">
                                <div class="div-right-cell">
                                    <h4 id="routineName">Routine Name</h4>
                                    <p id="routineDescription">Routine Desrciption</p>
                                </div>
                            </td>
                            <td class="fourth-cell">
                                <select style="width: 100%;" id="routineExercises" name="RoutineExerciseID" size="10" onchange="getRoutineExerciseInformation( 'exercises', this.value )"> 
                                    <option>Select Routine</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="div-row">
                            <td></td>
                            <td></td>
                            <td class="right-cell">
                                <div class="div-right-cell">
                                    <h4 id="routineExerciseName">Workout Description</h4>
                                    <p id="routineExerciseDescription">Workout desrciption</p>
                                </div>
                            </td>
                            <td class="fourth-cell">
                                <table style="width: 100%">
                                    <tr>
                                        <td>
                                            Repetition:
                                        </td>
                                        <td id="RoutineExerciseReps">
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sets:
                                        </td>
                                        <td id="RoutineExerciseSets">
                                            0
                                        </td>
                                    </tr>
                                        <td>
                                            Calories Burned:
                                        </td>
                                        <td id="RoutineExerciseCalories">
                                            0
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                if(isset($_POST['routineRemove'])){
                    global $db;
                    try{
                        $statement = $db->prepare("DELETE FROM personalroutines WHERE exerciseid = :ExerciseID");
                        //Bind Variables
                        $statement->bindValue(':ExerciseID', $_POST['exerciseID']);
                        $statement->execute();
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    catch (Exception $e) {
                        echo "<div class=\"error\">Could Not Delete Row: Personal Routine Still Has Exercises in it</div>";
                        //$e->getMessage();
                        exit();
                    }
                }

                //Edit exercises in a routine
                if(isset($_POST['routineEdit'])){
                    $_SESSION['RoutineEdit'] = $_POST['RoutineID'];
                    echo '<script type="text/javascript"> window.location.replace("addExerciseToRoutine.php"); </script>';
                }

                ?>
    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! For Personal Routines And Personal Routine Exercises !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--
                <h1>Personal Routines and Exercises</h1>
                <table class="framework">
                    <tbody>
                        <tr class="div-row">
                            <td class="div-left-cell">
                               
                                <form action="#" method="post" id="personalRoutineRemove">
                                    <select style="width: 100%;" name="personalRoutineID" size="10" onchange="getPersonalRoutineInformation( 'personalRoutines', this.value )"> 
                                        <?php
                                        /*
                                            $statement = $db->prepare("SELECT * FROM routines INNER JOIN personalroutines
                                                                        ON routines.
                                                                        (SELECT * FROM personalRoutines WHERE personid = 
                                                                        (SELECT personid FROM users WHERE username = :userName))");
                                            $statement->bindValue(':userName', $_POST['login_user'], PDO::PARAM_STR);
                                            $statement->execute();
                                            $x = 0;

                                            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                                            {
                                                $exercisename = $row['exercisename'];
                                                $exerciseid = $row['exerciseid'];
                                                echo "<option value=\"$exerciseid\">$exercisename</option>";
                                            }
                                            */
                                        ?>
                                    </select>
                                
                            </td>
                            <td class="middle-cell">
                                <div class="center-cell">
                                    <input type="submit" name="personalRoutineRemove" value="Delete Row" id="DeletePersonalRoutineButton"/>
                                    </form>
                                    <br>
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
                <?php
                /*
                if(isset($_POST['personalRoutineRemove'])){
                    global $db;
                    try{
                        $statement = $db->prepare("DELETE FROM personalroutines WHERE exerciseid = :ExerciseID");
                        //Bind Variables
                        $statement->bindValue(':ExerciseID', $_POST['exerciseID']);
                        $statement->execute();
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    catch (Exception $e) {
                        echo "<div class=\"error\">Could Not Delete Row: Personal Routine Still Has Exercises in it</div>";
                        //$e->getMessage();
                        exit();
                    }
                }
                */
                ?>
            </div>
            
<?php
if(isset($_GET['logout'])) {
    $_SESSION['login_user'] = NULL;
    echo '<script type="text/javascript"> toLoginPage(); </script>';
    //die();
     //window.location.replace("login.php")
    //echo "Login_user is: " . $_SESSION["login_user"];
}

  include('../includes/footer.php');
?>
