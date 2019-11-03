<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();

    include('../includes/header.php');

    if ($_SESSION['login_user'] != NULL)
    {
        header("location: fitnessHomeScreen.php");
    }
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "LoginandSign.css">
</head>

<div class="main_contents">
    <div class="button-container">
        <a class="button-gen" href="signup.php">Sign Up</a>
    </div>
    <div class="loginBox">
        <div class="innerloginbox">
            <form name="display" class="noBullets" action="login.php" method="POST" >
                <li>User Name:</li>
                <li><input type="text" class="form-control" name="username" id="inputUserName" required></li>
                <li>Password:</li>
                <li><input type="password" class="form-control" name="password" id="inputPassword" required></li>
                <br>
                <li><input type="submit" name="submit" value="Log In" /></li>
            </form>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        try
        {
            $db = get_db();
            $_SESSION['login_user'] = NULL;
            $statement = $db->prepare("SELECT username, password FROM users WHERE username = :UserName");

            //Bind Variables
            $statement->bindValue(':UserName', $_POST['username'], PDO::PARAM_STR);

            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // If the credentials Don't exist display a message
            if(isset($row['username']) && password_verify($_POST['password'], $row['password'])) {
                //session_register("login_user");
                $_SESSION['login_user'] = $row['username'];
                
                header("location: fitnessHomeScreen.php");
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