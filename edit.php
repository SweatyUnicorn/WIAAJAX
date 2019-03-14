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
        <?php
            if (isset($_SESSION["zalogowany"]) && isset($_SESSION["login"]) && $_SESSION["login"]=="admin")
            {
                if (isset($_POST["edit"]))
                {
                    $id=$_POST["edit"];
                    echo "ID edytowanego posta to: $id";
                    $title="test1";
                    $content="test2";

                    $link=mysqli_connect("localhost", "root", "", "website");
                    mysqli_query($link, "SET NAMES utf8");
                    $result=mysqli_query($link, "SELECT title, content FROM post WHERE id = $id");
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $title=$row["title"];
                        $content=$row["content"];

            ?>
            <form class="left add_artic" action="update.php" method="post">
                <div style="margin-left: 20%">
                    <div class="left">
                        Tytuł artykułu: <input class="border fgold_colo" type="text" name="title" <?php echo "value='$title'";?> placeholder="title" required> 
                    </div>
                    <div class="left" style="margin-left: 40px;">
                        Kategoria: <select class="border fgold_colo" name="category" required>
	                        <option value="news">news</option>
	                        <option value="konkurs">konkurs</option>
	                        <option value="film">film</option>
	                        <option value="gra">gra</option>
	                        <option value="książka">książka</option>
                            <option value="muzyka">muzyka</option>
                        </select>
                    </div>
                </div>
                <div class="left clear">
                    <textarea class="border fgold_colo" name="content" cols="100" rows="10" placeholder="treść artykułu..." required><?php echo "$content";?></textarea>
                </div>
                
                <div class="left clear">
                    Przypięty: 
                    <input type="radio" name="slug" value="Tak" required>Tak
                    <input type="radio" name="slug" value="Nie" required>Nie
                </div>

                <div class="left clear">
                    Publikowalny: 
                    <input type="radio" name="status" value="Tak" required>Tak
                    <input type="radio" name="status" value="Nie" required>Nie
                </div>
                
                <div class="left clear">
                    wybierz tagi: (jeśli istniał jakiś tag dla posta i nie zostanie on zaznacznony, będzie to równoznaczne z usunięciem go)
                    <div id="add_tag">
                        <input type="checkbox" name="tag1" value="Rock">Rock
                        <input type="checkbox" name="tag2" value="Pop">Pop
                        <input type="checkbox" name="tag3" value="RPG">RPG
                        <input type="checkbox" name="tag4" value="FPS">FPS
                        <input type="checkbox" name="tag5" value="Horror">Horror
                        <input type="checkbox" name="tag6" value="Akcja">Akcja
                        <input type="checkbox" name="tag7" value="Fantasy">Fantasy
                        <input type="checkbox" name="tag8" value="Wypadek">Wypadek
                        <input type="checkbox" name="tag9" value="Szkoła">Szkoła
                        <input type="checkbox" name="tag10" value="Studia">Studia
                        <input type="hidden" name="id_hid" <?php echo "value='$id'" ?>>
                    </div>
                </div>

                <input class="add_button left clear button" style="width: 120px" type="submit" value="Update"> 
            </form>
            <?php
                    }
                } 
            } else 
            {
                echo "<div id='no_admin2'></div>";
            }
            ?>
        </main>
        <footer>
            <p  id="copyright">Copyright &copy 2018 by Dominik Molenda</p>
        </footer>
    </body>
</html>