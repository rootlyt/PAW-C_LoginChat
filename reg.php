<?php
if(isset($_POST["user"]) && isset($_POST["pass"]))
{
 
    $file=fopen("user.txt","r");
    $finduser = false;
    while(!feof($file))
    {
        $line = fgets($file);
        $array = explode(";",$line);
        if(trim($array[0]) == $_POST['user'])
        {
            $finduser=true;
            break;
        }
    }
    fclose($file);
    
  
    if( $finduser )
    {
        echo $_POST["user"];
        echo ' existed!\r\n';
        include 'reg.html';
    }
    else
    {
        $file = fopen("user.txt", "a");
        fputs($file,$_POST["user"].";".$_POST["pass"].";".$_POST["nama"].";".$_POST["email"].";".$_POST["KotaAsal"]."\r\n");
        fclose($file);
        echo "<div style='text-align: center;background-color: powderblue'>User ".$_POST['user']." sukses didaftarkan, silahkan<a href='login.php'>Login</a></div> "; 
    }
}
else
{
    include 'reg.html';
}
?>
