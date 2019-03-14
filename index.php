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
                        <input class="border fgold_colo" type="text" name="nickname" placeholder="nickname" required> 
                        <input class="border fgold_colo" type="password" name="password" placeholder="password" required>
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
            $link=mysqli_connect("localhost", "root", "", "sound_news");
            mysqli_query($link, "SET NAMES utf8");

            //tu będzie wyświetlania postów
            /*$result=mysqli_query($link, "SELECT post.id, post.title, post.content, post.status, post.slug, category.category FROM category, post WHERE post.id_category = category.id_category ORDER BY post.slug DESC, post.id DESC");

            while($row=mysqli_fetch_assoc($result))
                    {
                        $id_post=$row["id"];
                        $title=$row["title"];
                        $content=$row["content"];
                        $status=$row["status"];
                        $slug=$row["slug"];
                        $categ=$row["category"];

                        if($status=="Tak")
                        {
                        echo "<article>
                                <h4>$title</h4>
                                    <section>
                                        <p>$content</p>
                                        <form action='post.php' method='post'>
                                        <input type='hidden' name='preview' value='$id_post'>
                                        <input class='button' type='submit' value='read more...' name='read_more'>
                                        </form>
                                    </section>
                                </article>";
                        }
                    }*/
            ?>
        </main>
        <footer>
            <p  id="copyright">Copyright &copy 2019 by Dominik Molenda & Michał Stelmaszyk</p>
        </footer>
    </body>
</html>