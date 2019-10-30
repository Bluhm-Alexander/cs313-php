<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();

    include('../includes/header.php');
?>

<div class="main_contents">
    <a href="signup.php">Sign Up</a>
    <div>
        <form name="display" action="login.php" method="POST" >
            <li>User Name:</li>
            <li><input type="text" name="username" /></li>
            <li>Password:</li>
            <li><input type="textbox" name="password"></li>
            <li><input type="submit" name="submit" /></li>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        try
        {
            $db = get_db();

            

            $statement = $db->prepare("SELECT username, password FROM users WHERE username = :UserName");

            //Bind Variables
            $statement->bindValue(':UserName', $_POST['username'], PDO::PARAM_STR);

            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $count = pg_num_rows($statement);

            // If the credentials Don't exist display a message
            if(isset($row['username']) && password_verify($_POST['password'], $row['password'])) {
                //session_register("login_user");
                $_SESSION['login_user'] = $row['username'];
                
                header("location: welcome.php");
             }
             else {
                echo "Your Login Name or Password is invalid";
             }
        }
        catch (Exception $ex)
        {
            // Please be aware that you don't want to output the Exception message in
            // a production environment
            echo "Error with DB. Details: $ex";
            die();
        }
    }

  include('../includes/footer.php');
?>