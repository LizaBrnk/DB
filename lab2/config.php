<?php
mysqli_report(MYSQLI_REPORT_OFF);
$dblocation="127.0.0.1";
// $dblocation="localhost";
$dbuser="root";
$dbpassword="";
$dbbase="data_base_2";

$dbcon=mysqli_connect($dblocation,$dbuser,$dbpassword);
if(!$dbcon)
  {
    exit("<P> Сервер не доступний </P>");
  }
else
  {
    echo "<P>Зв'язок встановлено</P>";
  }

if(!mysqli_select_db($dbcon,$dbbase))
  {
    exit("<P> База не доступна </P>");
  }
else
  {
    echo "<P>Зв'язок з базою 'data_base_2' встановлено</P>";
  }
?>