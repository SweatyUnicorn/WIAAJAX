<?php
    if(isset($_POST["delete"]))
    {
        $id_del=$_POST["delete"];
        $link=mysqli_connect("localhost", "root", "", "website");
        mysqli_query($link, "SET NAMES utf8");
        mysqli_query($link, "DELETE FROM post_tags WHERE id_post=$id_del");
        mysqli_query($link, "DELETE FROM post WHERE id=$id_del");
        echo "id usuniętego artykułu to $id_del";
        header("Location: admin_panel.php");
    }
    header("Location: admin_panel.php");
?>