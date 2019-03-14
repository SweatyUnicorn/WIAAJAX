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

        
            if (isset($_POST["title"])  && isset($_POST["category"]) && isset($_POST["content"]) && isset($_POST["slug"]) && isset($_POST["status"]))
            {
                $title=$_POST["title"];
				$category=$_POST["category"];
                $content=$_POST["content"];
                $slug=$_POST["slug"];
                $status=$_POST["status"];
                
                $slugnumb="test";
                
                echo $category;
                echo "Dodaje artykul o tytule $title<br>";
                $link=mysqli_connect("localhost", "root", "", "website");
                mysqli_query($link, "SET NAMES utf8");
                $id_cat=mysqli_query($link, "SELECT category.id_category AS CAT FROM category WHERE category='$category'");
                echo "SELECT category.id_category AS CAT FROM category WHERE category='$category'<br>";
               
                $catRow=mysqli_fetch_assoc($id_cat);
                $id_category=$catRow["CAT"];
                
                echo "id kategorii to $id_category<br>";
                
                if($slug=="Nie")
                {
                    $slugnumb=0;
                }else if ($slug=="Tak")
                {
                    $slugnumb=1;
                }
                echo "0 to nie 1 to tak, czy przypiety post $slugnumb<br>";
                echo "$content<br>";
                echo "$status publikowalna<br>";

                $returnQuery=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                $ifslug=mysqli_query($link, "SELECT * FROM post WHERE slug");
                if ($returnQuery->num_rows != 0) 
                {
                    echo "Taki artykuł juz istnieje";
                    header("Location: add_article.php");
                }else if ($ifslug && $slugnumb==1)
                {
                    mysqli_query($link, "UPDATE post SET slug=0 WHERE slug");
                    mysqli_query($link, "INSERT INTO post VALUES ('','$title','$content','$status','$slugnumb','$id_category')");
                    if(isset($_POST["tag1"])) 
                {
                    echo "jestes w tagu 1<br>";
                    $tag=$_POST["tag1"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }

                if(isset($_POST["tag2"])) 
                {
                    echo "jestes w tagu 2<br>";
                    $tag=$_POST["tag2"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                
                if(isset($_POST["tag3"]))
                { 
                    echo "jestes w tagu 3<br>";
                    $tag=$_POST["tag3"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                
                if(isset($_POST["tag4"])) 
                {
                    echo "jestes w tagu 4<br>";
                    $tag=$_POST["tag4"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag5"])) 
                {
                    echo "jestes w tagu 5<br>";
                    $tag=$_POST["tag5"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag6"])) 
                {
                    echo "jestes w tagu 6<br>";
                    $tag=$_POST["tag6"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag7"])) 
                {
                    echo "jestes w tagu 7<br>";
                    $tag=$_POST["tag7"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag8"])) 
                {
                    echo "jestes w tagu 8<br>";
                    $tag=$_POST["tag8"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag9"])) 
                {
                    echo "jestes w tagu 9<br>";
                    $tag=$_POST["tag9"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag10"])) 
                {
                    echo "jestes w tagu 10<br>";
                    $tag=$_POST["tag10"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    
					mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                header("Location: admin_panel.php");
      
                }else 
                {
                    mysqli_query($link, "INSERT INTO post VALUES ('','$title','$content','$status','$slugnumb','$id_category')");
                    if(isset($_POST["tag1"])) 
                {
                    echo "jestes w tagu 1<br>";
                    $tag=$_POST["tag1"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }

                if(isset($_POST["tag2"])) 
                {
                    echo "jestes w tagu 2<br>";
                    $tag=$_POST["tag2"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                
                if(isset($_POST["tag3"]))
                { 
                    echo "jestes w tagu 3<br>";
                    $tag=$_POST["tag3"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                
                if(isset($_POST["tag4"])) 
                {
                    echo "jestes w tagu 4<br>";
                    $tag=$_POST["tag4"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag5"])) 
                {
                    echo "jestes w tagu 5<br>";
                    $tag=$_POST["tag5"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag6"])) 
                {
                    echo "jestes w tagu 6<br>";
                    $tag=$_POST["tag6"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag7"])) 
                {
                    echo "jestes w tagu 7<br>";
                    $tag=$_POST["tag7"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag8"])) 
                {
                    echo "jestes w tagu 8<br>";
                    $tag=$_POST["tag8"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag9"])) 
                {
                    echo "jestes w tagu 9<br>";
                    $tag=$_POST["tag9"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                if(isset($_POST["tag10"])) 
                {
                    echo "jestes w tagu 10<br>";
                    $tag=$_POST["tag10"];
                    $id_post=mysqli_query($link, "SELECT id FROM post WHERE title='$title'");
                    $row=mysqli_fetch_assoc($id_post);
                            $post_id=$row["id"];
                    echo "id artykułu to $post_id<br>";

                    $id_tag=mysqli_query($link, "SELECT id_tag FROM tag WHERE tag='$tag'");
                    $row=mysqli_fetch_assoc($id_tag);
                            $tag_id=$row["id_tag"];
                    echo "id tagu to $tag_id<br>";
                    
                    
					mysqli_query($link, "INSERT INTO post_tags VALUES ('','$post_id', '$tag_id')");
                }
                header("Location: admin_panel.php");
                }
                              
            }else
            {
        ?>
        <?php
            if (isset($_SESSION["zalogowany"]) && isset($_SESSION["login"]) && $_SESSION["login"]=="admin")
            {
            ?>
            <form class="left add_artic" action="add_article.php" method="post">
                <div style="margin-left: 20%">
                    <div class="left">
                        Tytuł artykułu: <input class="border fgold_colo" type="text" name="title" placeholder="title" required> 
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
                    <textarea class="border fgold_colo" name="content" cols="100" rows="10" placeholder="treść artykułu..." required></textarea>
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
                    wybierz tagi:
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
                    </div>
                </div>

                <input class="add_button left clear button" type="submit" value="Add"> 
            </form>
            <?php 
            } else 
            {
                echo "<div id='no_admin2'></div>";
            }
            ?>
            <?php
                }
            ?>
        </main>
        <footer>
            <p  id="copyright">Copyright &copy 2018 by Dominik Molenda</p>
        </footer>
    </body>
</html>