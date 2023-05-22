<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhancement PHP</title>
    <link href="styles/style.css" rel="stylesheet"  media="screen"/>
</head>
<body>
	<?php 
        require 'header.inc' ;
    ?>
    <section id="enhancementMainSection">
        <div id="enhancementBackground">
            <div class="enchancementMainCard mainCardPreview">
                <ul>
                    <li class="en_responsive">
                        <a href="./login.php" class="en_hover_hide">Login & Logout
                        <p>Admin credentials are stored in database</p>
                        <p>When you login, the username will be sent to the database to see if the user exists, if it does, then we compare the passwords to see if it matches. </p>
                        <p>If it matches, we create an admin session and set it to true</p>
                        <p>Code to implement the feature is:</p>
                        <p>if (!$lockout && $password == $manager['password'])<br>
                            $_SESSION['admin'] = true;<br>
                            header('Location: manage.php');<br>
                            exit;</p>
                        </a>

                    </li>
                    <li class="en_hovering">
                        <a href="./login.php" class="en_hover_hide">Lockout
                        <p>To add some security into this, we added a lockout when there are too many failed attempts, 3 to be specific.</p>
                        <p>The lockout, will lock you out for five minutes if there are 3 failed attempts</p>
                        <p> Code to implement the feature is:
                        </p>
                        <p>
                        $tooManyAttempts = $manager['failedAttempts'] >= 3; <br>
                        $lockoutDuration = 5 * 60; // 5 minutes;<br>
                        $lastAttempt = time() - strtotime($manager['lastFailedAttempt']);<br>
                        $lockout = $tooManyAttempts && $lastAttempt < $lockoutDuration;<br>
                        </p>
                    </li>
                        </a>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>