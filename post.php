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
        <main style="min-height: 500px;">
            <?php

            if (isset($_POST["preview"]))
            {
                $id_post=$_POST["preview"];
                $link=mysqli_connect("localhost", "root", "", "website");
            mysqli_query($link, "SET NAMES utf8");
            $result=mysqli_query($link, "SELECT post.title, post.content, category.category FROM category, post WHERE post.id = $id_post AND post.id_category = category.id_category");

            while($row=mysqli_fetch_assoc($result))
                    {
                        $title=$row["title"];
                        $content=$row["content"];
                        $categ=$row["category"];

                        echo "<div id='post'>
                                <p>kategoria: $categ</p>
                                <h2>$title</h2>
                                    <section>
                                        
                                        <p>$content</p>
                                    </section>
                                ";
                                $resultTag=mysqli_query($link, "SELECT tag.tag FROM post_tags, tag WHERE tag.id_tag = post_tags.id_tag AND post_tags.id_post=$id_post");
                                echo "<p style='margin-top: 175px;'>tagi:";
                                while($row=mysqli_fetch_assoc($resultTag))
                                {
                                    $tagg=$row["tag"];
                                    echo "$tagg, ";
                                }
                                echo "</p>";

                        echo "</div>";
                    }
            }else
            {
                echo "<div id='no_admin1'></div>";
            }
            
            ?>
        </main>
        <footer>
            <p  id="copyright">Copyright &copy 2018 by Dominik Molenda</p>
        </footer>
    </body>
</html>