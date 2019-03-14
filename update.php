<?php
    if (isset($_POST["id_hid"]) && isset($_POST["title"])  && isset($_POST["category"]) && isset($_POST["content"]) && isset($_POST["slug"]) && isset($_POST["status"]))
    {
        $id_hid=$_POST["id_hid"];
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
        mysqli_query($link, "DELETE FROM post_tags WHERE id_post='$id_hid';");
        $ifslug=mysqli_query($link, "SELECT * FROM post WHERE slug");
        /*if ($returnQuery->num_rows != 0) 
        {   
                echo "$returnQuery->num_rows";
                echo "Taki artykuł juz istnieje";
                header("Location: add_article.php");
        }else*/ if ($ifslug && $slugnumb==1)
        {
            mysqli_query($link, "UPDATE post SET slug=0 WHERE slug");
            mysqli_query($link, "UPDATE post SET title='$title', content='$content', status='$status', slug=$slugnumb, id_category='$id_category' WHERE id=$id_hid");
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
            mysqli_query($link, "UPDATE post SET title='$title', content='$content', status='$status', slug=$slugnumb, id_category='$id_category' WHERE id=$id_hid");
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
    }
?>

