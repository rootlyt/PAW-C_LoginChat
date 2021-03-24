<?php  session_start(); ?>

<?php

if(isset($_SESSION['use']))  
                              
 {
    header("Location:chat.php"); 
    header("Location:reg.php"); 
 }
else
{
    include 'login.html';
}

if(isset($_POST['login']))  
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];

    if(isset($_POST["user"]) && isset($_POST["pass"])){
    $file = fopen('user.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
	if(trim($array[0]) == $_POST['user'] && trim($array[1]) == $_POST['pass']){
            $good=true;
            break;
        }
    }

    if($good){
	$_SESSION['use'] = $user;
        echo '<script type="text/javascript"> window.open("chat.php","_self");</script>';
    }else{
        echo '<p style=color:red;text-align:center;>Username atau Password salah, atau mau coba register?</p>';
    }
    fclose($file);
    }
    else{
        include 'login.html';
    }

}
if (isset($_SESSION['register']))
{
    echo '<script type="text/javascript"> window.open("reg.php","_self");</script>';
}
?>
