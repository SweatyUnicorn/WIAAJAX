<!DOCTYPE html>
<html>
    <head>
        <title>Unicorn News</title>
        <link rel="Shortcut icon" href="cookiecorn.png" />
        <link rel="stylesheet" href="main.css">
        <meta charset="UTF-8">
            
    </head>
    <body>
        <header>
            <img id="logo" src="cookiecorn.png">
            <p id="uni">Unicorn</p>
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
                        <input class="border fgold_colo" type="password" name="password" placeholder="password">
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
            <div class="infcon">
                strona została zrobiona na zadanie na zajęcia z WIA<br>
                właścicielem jest Dominik Molenda<br>
                Twórcą strony jest Dominik Molenda<br>
                Strona sotała wykonana w maju 2018 roku<br>
            </div>
        </main>
        <footer>
            <p  id="copyright">Copyright &copy 2018 by Dominik Molenda</p>
        </footer>
    </body>
</html>