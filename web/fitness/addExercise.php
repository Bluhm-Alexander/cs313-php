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
        $statement = $db->prepare("SELECT MAX(exerciseid) FROM exercises");
        $statement->execute();
        $LastID;
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $LastID = $row['exerciseid'];
        }
        $newID = $LastID + 1;
        $query = "INSERT INTO exercises VALUES ('$newID','$_POST[exercisename]',
        '$_POST[description]')";
        $result = pg_query($query); 
        if (!$result1)
        {
            echo "Update failed!!";
        } else
        {
            echo "Update successfull;";
        }
    ?>