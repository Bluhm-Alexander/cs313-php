Scrap for fitnessHomeScreen

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