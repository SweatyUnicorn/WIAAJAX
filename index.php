<?php
include 'header.php';
include 'nav.php';
?>
       
        <main>
            <?php
            $link=mysqli_connect("localhost", "root", "", "sound_news");
            mysqli_query($link, "SET NAMES utf8");
            ?>
        </main>
<?php
    include 'footer.php';
?>