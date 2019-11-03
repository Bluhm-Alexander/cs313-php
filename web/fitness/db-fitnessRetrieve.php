<?php

/***************************************************************************
 * db-fitnessRetrieve.php
 * 
 * Retrieves all information from databse and imports it into javascript
 * variables. Messy but it works. Will help make the web pages more dynamic.
 **************************************************************************/
    /**
     * Retrieve all information using AJAX and SQL
     * Listen for 'command' from javascript runs at
     * start of page.
     */
    if(isset($_POST['command'])&&$_POST['command']=='getMyData'){ 
        // .... get data from db
        // in your php, you'll need to loop over the tables you have and order the results something like this:
        include("dbConnect.php");
        $db = get_db();
        global $db;
        
        // exercise table
        $statement = $db->prepare("SELECT * FROM exercises");
        $statement->execute();
        $ExerciseTableResult = $statement->fetchAll();

        // routine table
        $statement = $db->prepare("SELECT * FROM routines");
        $statement->execute();
        $RoutineTableResult = $statement->fetchAll();

        // routine exercises table
        $statement = $db->prepare("SELECT * FROM routineexercises");
        $statement->execute();
        $routineExercisesResult = $statement->fetchAll();

        $tables=["exerciseTable"=> $ExerciseTableResult, "routinesTable"=> $RoutineTableResult, "routineExercisesTable"=> $routineExercisesResult];
        echo json_encode($tables);
        exit;
    }

    // getExercise();
    /**
     * Exercise Table
     * Catalog this for later in case I need it
     * */
    /*
    function getExercise() {
        global $db;
        $statement = $db->prepare("SELECT * FROM exercises");
        $statement->execute();
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $ExerciseName = $row['exercisename'];
            echo "<script> seteExerciseName( \"$ExerciseName\" ); </script>";
            echo $ExerciseName;
        }
    }
    **/
?>