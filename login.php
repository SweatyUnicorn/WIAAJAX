<?php
    session_start();
    $nickname=$_POST["nickname"];
    $password=$_POST["password"];
    $link=mysqli_connect( "localhost", "root", "", "sound_news" );
    $result=mysqli_query($link, "SELECT id FROM users WHERE login='$nickname' AND password='$password'");
    if ($result->num_rows == 0)
    {
        header("Location: index.php"); 
    }else
    {
		$_SESSION["zalogowany"]=1;
        $_SESSION["login"]=$nickname;
        header("Location: index.php");
	}
?>