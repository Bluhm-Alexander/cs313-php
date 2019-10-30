<?php
    session_start();

    require "dbConnect.php";
    $db = get_db();

    include('../includes/header.php');
?>

</div>
<div class="main-contents">
    <h1>Welcome</h1>

    <?php
        echo $_SESSION['login_user'];
    ?>

</div>

<?php
    include('../includes/footer.php');
?>