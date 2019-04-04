<?php
include 'header.php';
include 'nav.php';
?>
        
        <main>
            <?php  
                if (isset($_POST["nickname"]) && isset($_POST["pass1"]) && isset($_POST["pass2"]))
		        {
                        $nickname=$_POST["nickname"];
					    $pass1=$_POST["pass1"];
					    $pass2=$_POST["pass2"];
					    if ($pass1==$pass2)
					    {
						    echo "Rejestruje użytkownika $nickname<br>";
						    $link=mysqli_connect("localhost", "root", "", "sound_news");
						    $returnQuery=mysqli_query($link, "SELECT * FROM users WHERE login='$nickname'");
						    if ($returnQuery->num_rows != 0) echo "Taki login juz istnieje";
						    else mysqli_query($link, "INSERT INTO users VALUES('', '$nickname', '$pass1')");
					    }else
						echo "Hasla nie sa zgodne";
                }else
                echo "Uzyj formularza rejestracji";
                    if (!isset($_POST["login"])	&& !isset($_POST["pass"]) &&!isset($_POST["returnPass"]))
                {
                    echo "
                    <form action='register.php' method='post'>
                    <input class='border fgold_colo' type='text' name='nickname' placeholder='nickname' required><br>
                    <input class='border fgold_colo' type='text' name='pass1' placeholder='password' required><br>
                    <input class='border fgold_colo' type='text' name='pass2' placeholder='password' required><br>
                    <input class='button' type='submit' value='register' name='register'>
                    </form>";
                }
            ?>
            rejestrując się akceptujesz <a id="regulamin" href="regulamin.php">regulamin</a>
        </main>
        <?php
    include 'footer.php';
?>