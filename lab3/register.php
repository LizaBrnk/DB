<form action="register.php" method="post" >
       <style>
              .a
              {
                     text-align: center;
                     font-size: 25px;
                     margin: 0 0 0 25px;
              }
       </style>
       <div class="a"><a href="bd3.php">Повернутися на початковий екран</a></div>
</form>

<?php
       if(isset($_SESSION['name']))
       {
              echo "
                     <HTML><HEAD>
                     <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
                     </HEAD></HTML>
                     ";
              //session_unset();
              session_destroy();
       }
?>
