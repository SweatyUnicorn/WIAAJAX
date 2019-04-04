<?php
    include 'header.php';
    include 'nav.php';
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
                <input class="button" type="submit" value="Add Review"> 
            </form>
            </div>
            <div style='color: black; font-size: 64px; float: left;'>WSZYSTKIE ARTYKUŁY</div>

            <div style='background-color: rgb(218, 218, 218); width: 90%; min-height: 10px; clear: left; float: left; margin-top: 20px; margin-left: 5%;'>
                <?php
                    $link=mysqli_connect("localhost", "root", "", "sound_news");
                    mysqli_query($link, "SET NAMES utf8");
                    $result=mysqli_query($link, "SELECT recenzje.id, wykonawca.nazwa, album.nazwa, gatunek.nazwa, album.data_wydania, recenzje.tekst, recenzje.ocena, recenzje.data, recenzje.is_up
                    FROM wykonawca, album, recenzje, gatunek 
                    WHERE recenzje.album_id=album.id AND album.wykonawca_id=wykonawca.id AND album.gatunek_id=gatunek.id ORDER BY recenzje.id");
                    
                    echo "<table border='1' cellspacing='0' id='tabela'>
                            <tr>
                                <td width='5%'>ID</td><td width='10%'>Tytuł</td><td width='25%'>Treść</td><td width='10%'>Opublikowany</td><td width='10%'>Przypięty</td><td width='10%'>Kategoria</td><td width='15%'>Tagi</td><td width='15%'>Opcje</td>
                            </tr>
                            </table>";
                ?>
            </div>
            <?php     
            } else
            {
                echo "<div id='no_admin1'></div>";
            }?>
        </main>
<?php
    include 'footer.php';
?>