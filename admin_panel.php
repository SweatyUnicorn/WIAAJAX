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
        <?php
        if (isset($_SESSION["zalogowany"]) && isset($_SESSION["login"]) && $_SESSION["login"]=="admin")
         {?>
        <main>
        <?php
         }else{
            ?>
            <main class="stala_wysokosc">


            <?php
         }
            if (isset($_SESSION["zalogowany"]) && isset($_SESSION["login"]) && $_SESSION["login"]=="admin")
            {
            ?>
            <div style="flaot: left;">
            <form class="logreg" action="add_article.php" method="post">
                <input class="button" type="submit" value="Add Article"> 
            </form>
            <form class="logreg" action="admin_panel.php" method="post">
                <input type="text" name="search" placeholder="search...">
                <input type="image" src="search.png" style="width: 24px; height: 24 px;" alt="search">
            </form>
            </div>
            <div style='color: black; font-size: 64px; float: left;'>WSZYSTKIE ARTYKUŁY</div>

            <div style='background-color: rgb(218, 218, 218); width: 90%; min-height: 10px; clear: left; float: left; margin-top: 20px; margin-left: 5%;'>
                <?php
                    $link=mysqli_connect("localhost", "root", "", "website");
                    mysqli_query($link, "SET NAMES utf8");
                    $result=mysqli_query($link, "SELECT post.id, post.title, post.content, post.status, post.slug, category.category FROM category, post WHERE post.id_category = category.id_category ORDER BY post.id");

                   

                    /*SELECT post.id, post.title, post.content, post.status, post.slug, category.category FROM category, post WHERE post.id_category = category.id_category*/

                    /*SELECT post.id, post.title, post.content, post.status, post.slug, category.category, tag.tag FROM category, post, post_tags, tag WHERE post.id = post_tags.id_post AND tag.id_tag = post_tags.id_tag AND post.id_category = category.id_category*/
                    
                    echo "<table border='1' cellspacing='0' id='tabela'>
                            <tr>
                                <td width='5%'>ID</td><td width='10%'>Tytuł</td><td width='25%'>Treść</td><td width='10%'>Opublikowany</td><td width='10%'>Przypięty</td><td width='10%'>Kategoria</td><td width='15%'>Tagi</td><td width='15%'>Opcje</td>
                            </tr>";
                    if (isset($_POST["search"]))
                    {
                        $w_search=$_POST["search"];
                        $resultsearch=mysqli_query($link, "SELECT post.id, post.title, post.content, post.status, post.slug, category.category FROM category, post WHERE post.id_category = category.id_category AND (post.title LIKE '%$w_search%' OR post.content LIKE '%$w_search%') ORDER BY post.id");
                        while($row=mysqli_fetch_assoc($resultsearch))
                    {
                        $id_post=$row["id"];
                        $title=$row["title"];
                        $content=$row["content"];
                        $status=$row["status"];
                        $slug=$row["slug"];
                        $categ=$row["category"];

                        if($slug==0)
                        {
                            $slug="Nie";
                        }else if($slug==1)
                        {
                            $slug="Tak";
                        }
                        
                        echo "<tr>";
                        echo "<td>$id_post</td><td>$title</td><td>$content</td><td>$status</td><td>$slug</td><td>$categ</td><td>";
                        $resultTag=mysqli_query($link, "SELECT tag.tag FROM post_tags, tag WHERE tag.id_tag = post_tags.id_tag AND post_tags.id_post=$id_post");
                        while($row=mysqli_fetch_assoc($resultTag))
                        {
                            $tagg=$row["tag"];
                            echo "$tagg, ";
                        }
                        echo "</td><td>
                        <form action='edit.php' method='post'>
                            <input type='image' src='edit.png' style='width: 24px; height: 24 px;' alt='edit' name='edit' value='$id_post'>
                        </form>
                        <form action='post.php' method='post'>
                            <input type='image' src='preview.png' style='width: 24px; height: 24 px;' name='preview' alt='preview' value='$id_post'>
                        </form>
                        <form action='delete.php' method='post'>
                            <input type='image' src='delete.png' style='width: 24px; height: 24 px;' name='delete' alt='delete' value='$id_post'>
                        </form>
                        </td>";
                        echo "</tr>";
                        //edycja podgląd usuń
                    }
                    echo "</table>";
                ?>
                <?php
                    } else
                    {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $id_post=$row["id"];
                        $title=$row["title"];
                        $content=$row["content"];
                        $status=$row["status"];
                        $slug=$row["slug"];
                        $categ=$row["category"];

                        if($slug==0)
                        {
                            $slug="Nie";
                        }else if($slug==1)
                        {
                            $slug="Tak";
                        }
                        
                        echo "<tr>";
                        echo "<td>$id_post</td><td>$title</td><td>$content</td><td>$status</td><td>$slug</td><td>$categ</td><td>";
                        $resultTag=mysqli_query($link, "SELECT tag.tag FROM post_tags, tag WHERE tag.id_tag = post_tags.id_tag AND post_tags.id_post=$id_post");
                        while($row=mysqli_fetch_assoc($resultTag))
                        {
                            $tagg=$row["tag"];
                            echo "$tagg, ";
                        }
                        echo "</td><td>
                        <form action='edit.php' method='post'>
                            <input type='image' src='edit.png' style='width: 24px; height: 24 px;' alt='edit' name='edit' value='$id_post'>
                        </form>
                        <form action='post.php' method='post'>
                            <input type='image' src='preview.png' style='width: 24px; height: 24 px;' name='preview' alt='preview' value='$id_post'>
                        </form>
                        <form action='delete.php' method='post'>
                            <input type='image' src='delete.png' style='width: 24px; height: 24 px;' name='delete' alt='delete' value='$id_post'>
                        </form>
                        </td>";
                        echo "</tr>";
                        //edycja podgląd usuń
                    }
                    echo "</table>";
                ?>
            </div>
            <?php
                    }
            } else
            {
                echo "<div id='no_admin1'></div>";
            }?>
        </main>
        <footer>
            <p  id="copyright">Copyright &copy 2018 by Dominik Molenda</p>
        </footer>
    </body>
</html>