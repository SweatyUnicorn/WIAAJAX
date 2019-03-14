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
                        <input class="border fgold_colo" type="text" name="nickname" placeholder="nickname"> 
                        <input class="border fgold_colo" type="text" name="password" placeholder="password">
                        <input class="button" type="submit" value="login"> 
                    </form>
                    <?php
                }
            ?>
        </header>
        <nav>
            | <a class="menu_option" href="index.php">Main</a> | 
            <a class="menu_option" href="info.php">Info</a> |
            <a class="menu_option" href="contact.php">Contact</a> |
            <?php
            if (isset($_SESSION["zalogowany"]) && isset($_SESSION["login"]) && $_SESSION["login"]=="admin")
            {
            ?>
            <a class="menu_option" href="admin_panel.php">Admin Panel</a> |
            <?php 
            }
            ?>
        </nav>
        <main>
            <?php  
                if (isset($_POST["nickname"]) && isset($_POST["pass1"]) && isset($_POST["pass2"]))
		        {
                        $nickname=$_POST["nickname"];
					    $pass1=$_POST["pass1"];
					    $pass2=$_POST["pass2"];
					    if ($pass1==$pass2)
					    {
						    echo "Rejestruje użytkownika $nickname<br>";
						    $link=mysqli_connect("localhost", "root", "", "sound_news");
						    $returnQuery=mysqli_query($link, "SELECT * FROM users WHERE login='$nickname'");
						    if ($returnQuery->num_rows != 0) echo "Taki login juz istnieje";
						    else mysqli_query($link, "INSERT INTO users VALUES('', '$nickname', '$pass1')");
					    }else
						echo "Hasla nie sa zgodne";
                }else
                echo "Uzyj formularza rejestracji";
                    if (!isset($_POST["login"])	&& !isset($_POST["pass"]) &&!isset($_POST["returnPass"]))
                {
                    echo "
                    <form action='register.php' method='post'>
                    <input class='border fgold_colo' type='text' name='nickname' placeholder='nickname' required><br>
                    <input class='border fgold_colo' type='text' name='pass1' placeholder='password' required><br>
                    <input class='border fgold_colo' type='text' name='pass2' placeholder='password' required><br>
                    <input class='button' type='submit' value='register' name='register'>
                    </form>";
                }
            ?>
            rejestrując się akceptujesz <a id="regulamin" href="regulamin.php">regulamin</a>
        </main>
        <footer>
            <p  id="copyright">Copyright &copy 2019 by Dominik Molenda & Michał Stelmaszyk</p>
        </footer>
    </body>
</html>