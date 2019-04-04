<?php
include 'header.php';
include 'nav.php';
        
         if (isset($_SESSION["zalogowany"]) && isset($_SESSION["login"]) && $_SESSION["login"]=="admin")
         {?>
        <main>
        <?php
         }else
         {
            ?>
            <main class="stala_wysokosc">
            <?php
         }
            if (isset($_SESSION["zalogowany"]) && isset($_SESSION["login"]) && $_SESSION["login"]=="admin")
            {
            ?>
            <form class="left add_artic" action="add_article.php" method="post">
                <div style="margin-left: 20%">
                    <div class="left">
                        Tytuł albumu: <input class="border fgold_colo" type="text" name="title" placeholder="title" required>
                    </div>
                    <div class="left" style="margin-left: 40px;">
                    wykonawca: <input class="border fgold_colo" type="text" name="wykon" placeholder="wykonawca" required>
                    </div>
                </div>
                <div class="left clear">
                    <textarea class="border fgold_colo" name="content" cols="100" rows="10" placeholder="treść artykułu..." required></textarea>
                </div>

                <div class="left clear">
                    Publikowalny: 
                    <input type="radio" name="status" value="Tak" required>Tak
                    <input type="radio" name="status" value="Nie" required>Nie
                </div>
                <div class="left clear">
                gatunek: <input class="border fgold_colo" type="text" name="gatunek" placeholder="gatunek" required>
                data wydania: <input class="border fgold_colo" type="text" name="wyd" placeholder="wyd" required>
                ocena: <input type="number" name="oce" placeholder="ocena" required>
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
            ?>
        </main>
        <?php
    include 'footer.php';
?>