<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();

    include('../includes/header.php');
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "LoginandSign.css">
</head>

<div class="main_contents">
    <div class="button-container">
        <a class="button-gen" href="login.php">Back To Login</a>
    </div>
        <div class="loginBox">
            <div class="innerloginbox">
                <form action="signup.php" method="POST">
                <div class="form-group row">
                <label for="inputFirst" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="first_name" id="inputFirst" placeholder="First Name" required>
                    </div>
                </div>
                <div class="form-group row">
                <label for="inputLast" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="last_name" id="inputLast" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="inputUsername" placeholder="username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
                    <input type="submit" name="submit" value="Sign Up"/>
                </div>
            </div>
        </div>
</form>

</div>

<?php
    //echo $_SESSION['login_user'] . "<br>";
    if(isset($_POST['submit'])){
        //echo "line 46 isset <br>";
        $db = get_db();
        $username = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars($_POST['password']);
        $fname = htmlspecialchars($_POST['first_name']);
        $lname = htmlspecialchars($_POST['last_name']);
        //hash the password before adding it to the database
        $passwordHash = password_hash($pass, PASSWORD_DEFAULT);

        //echo "line 56 isset <br>";

     try{
        echo "line 59 try <br>";
        $statement = $db->prepare("SELECT MAX(personid) FROM users");
        $statement->execute();

        $lastID = $statement->fetch(PDO::FETCH_ASSOC);
        $newID = $lastID['max'] + 1;

        //echo "line 66 try <br>";

          $result = $db->prepare("INSERT INTO users (PersonID, Username, Password, FirstName, LastName) 
                                VALUES( :newid, :user, :pass, :fname, :lname)");
          $result->bindParam('newid', $newID);
          $result->bindParam('fname', $fname);
          $result->bindParam('lname', $lname);
          $result->bindParam('user', $username);
          $result->bindParam('pass', $passwordHash);

          //echo "line 76 try <br>";

          /*echo $newID."<br>";
          echo $fname."<br>";
          echo $lname."<br>";
          echo $username."<br>";
          echo $passwordHash."<br>";
          */
          
          $result->execute();
          $rows = $result->fetch(PDO::FETCH_ASSOC);
          
          $_SESSION['login_user'] = $username;

          header("location: login.php");
      }
      catch (Exception $e) {
          echo "Could not create new user". $e->getMessage();
          exit();
      }

    }

    include('../includes/footer.php');
?>