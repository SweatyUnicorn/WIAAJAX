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
            <p>1. Admin ma prawo robić co chce</p><br>
            <p>2. Admin ma zawsze racje...</p><br>
            <p>3. Jeśli nie, patrz punkt wyrzej</p><br>
            <p>4. użytkonicy nie mogę stosować przekleństw</p><br>
            <p>5. Dane użytkonika mogą być wykorzystane przez Admina na różne sposoby, bez wiedzy użytkownika</p><br>
        </main>
        <footer>
            <p  id="copyright">Copyright &copy 2018 by Dominik Molenda</p>
        </footer>
    </body>
</html>