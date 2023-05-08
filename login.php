<?php

    // login.php

    session_start();

    require_once 'settings.php';

    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
        header('Location: manage.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT failedAttempts, lastFailedAttempt, password FROM managers WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $manager = mysqli_fetch_assoc($result);
        if($manager) {
            $tooManyAttempts = $manager['failedAttempts'] >= 3; //check to see if failed attempts is more than or equal to 3
            $lockoutDuration = 5 * 60; // 5 minutes
            $lastAttempt = time() - strtotime($manager['lastFailedAttempt']);
            $lockout = $tooManyAttempts && $lastAttempt < $lockoutDuration;
            if (!$lockout && $password == $manager['password']) {
                $_SESSION['admin'] = true;
                header('Location: manage.php');
                exit;
            } else {
                if($lockout) {
                    $errorMessage = 'Too many failed attempts. Please try again later';
                } else {
                    //if the last attempt is more than 5 mins ago, it resets the mysql database of failed attempts back to 0
                    if ($lastAttempt >= $lockoutDuration) {
                        $query = "UPDATE managers SET failedAttempts = 0 WHERE username = '$username'";
                        mysqli_query($conn, $query);
                    }

                    //everytime there is a failed attempt, it adds 1 to the attempts and updates the last failed time to the now or submission time
                    $query = "UPDATE managers SET failedAttempts = failedAttempts + 1, lastFailedAttempt = NOW() WHERE username = '$username'";
                    if(mysqli_query($conn, $query)) {
                        //if it is not locked out, it will display the number of attempts left, along with the password is invalid
                        $errorMessage = 'Invalid password. $failedAttempts attempts remaining.';
                    }
                }
            }
        } else {
            $errorMessage = 'Account doesn\'t exist';
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="manage.css">

</head>
<body>
    <h1 class="title">Login</h1>

    <?php if (isset($errorMessage)): ?>
        <p class="errorMessage"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form class="loginForm" action="login.php" method="post">
        <label for="username" class="label">Username:</label>
        <input type="text" name="username" id="username" class="input" required>
        <br><br>
        <label for="password" class="label">Password:</label>
        <input type="password" name="password" id="password" class="input" required>
        <br><br>
        <input type="submit" value="Login" class="button">
    </form>
</body>
</html>