<!DOCTYPE html>
<html>
    <head>
        <title>Sound_News</title>
        <link rel="Shortcut icon" href="soundwave.png" />
        <link rel="stylesheet" href="main.css">
        <meta charset="UTF-8">
            
    </head>
    <body>
        <header>
            <img id="logo" src="soundwave.png">
            <p id="uni">Sound</p>
            <p id="news">News</p>

            <?php
                session_start();
                if (isset($_SESSION["zalogowany"])){
                    echo "
                        <form class='logreg' action='logout.php' method='post'>".$_SESSION['login']."<input class='button' type='submit' value='logout'>
                        </form>";
                }else
                {   ?>
                    <form class="logreg" action="register.php" method="post">
                        <input class="button" type="submit" value="register">
                    </form>
                    <form class="logreg" action="login.php" method="post">
                        <input class="border fgold_colo" type="text" name="nickname" placeholder="nickname" required> 
                        <input class="border fgold_colo" type="password" name="password" placeholder="password" required>
                        <input class="button" type="submit" value="login"> 
                    </form>
                    <?php
                }
            ?>
                    </header>
