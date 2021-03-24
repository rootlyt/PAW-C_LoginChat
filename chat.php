<?php   session_start();  ?>

<html>
  <head>
       <title> Chat </title>
  </head>
  
  <body>
<?php
      if(!isset($_SESSION['use']))
       {
           header("Location:login.php");  
       }
          echo "<div style='text-align: center'>User ".$_SESSION['use']." Login Sukses</div> ";
          include 'chat.html';
          echo "<div style='text-align: center'><a href='logout.php'> Logout</a></div> ";  
?>
</body>
</html>
