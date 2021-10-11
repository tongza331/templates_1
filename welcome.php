<?php
    session_start();
    if (!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in fisrt";
        header('location: homepage.php');
    }

    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: homepage.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style_error.css">
        <title>Welcome to What's Up</title>
    </head>
    <body>
        <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="success">
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php if (isset($_SESSION['username'])); ?>
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p><a href="homepage.php?logout='1'" style="color: red;">Logout</a></p>
            <?php endif ?>
        </div> 
    </body>
</html>