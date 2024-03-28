<?php
include "config.php";
/*
----------------mysqli_fetch_array----------------
*/

$query = "select * from product_type_dyrectory";
$ver=mysqli_query($dbcon,$query);

if(!$ver) 
{
  echo "<P> Не вдалося встановити зв'язок з таблицею 'product_type_dyrectory' </P>";
  exit(mysqli_error());
}

echo "<P><B> Таблиця 'product_type_dyrectory' </B></P>";
echo "<table border=1>";
echo"<tr>
  <td><B>KODTP</B></td>
  <td><B>NAMETP</B></td>
</tr>";
while($rez=mysqli_fetch_array($ver,MYSQLI_BOTH))
{
  echo "<tr>
          <td> $rez[KODTP] </td>
          <td> $rez[1] </td>
       </tr>";
}
echo "</table>";
echo "<P>   </P>";


/*
----------------mysqli_fetch_assoc----------------
*/

$query = "select * from trademark_directory";
$ver=mysqli_query($dbcon,$query);

if(!$ver) 
{
  echo "<P> Не вдалося встановити зв'язок з таблицею 'trademark_directory' </P>";
  exit(mysqli_error());
}

echo "<P><B> Таблиця 'trademark_directory' </B></P>";
echo "<table border=1>";
echo"<tr>
  <td><B>KODTM</B></td>
  <td><B>NAMETM</B></td>
</tr>";
while($ord =mysqli_fetch_assoc($ver))
{
  echo "<tr>
          <td> ".$ord['KODTM']." </td>
          <td> ".$ord['NAMETM']." </td>
       </tr>";
}

echo "</table>";
echo "<P>   </P>";

/*
----------------mysqli_fetch_row----------------
*/

$query = "select * from price_list";
$ver=mysqli_query($dbcon,$query);

if(!$ver) 
{
  echo "<P> Не вдалося встановити зв'язок з таблицею 'price_list' </P>";
  exit(mysqli_error());
}

echo "<P><B> Таблиця 'price_list' </B></P>";
echo "<table border=1>";
echo"<tr>
  <td><B>KODPR</B></td>
  <td><B>KODTM</B></td>
  <td><B>KODTP</B></td>
  <td><B>CINA_OD</B></td>
</tr>";
while(list($KODPR,$KODTM,$KODTP,$CINA_OD)=mysqli_fetch_row($ver))
{
  echo "<tr>
          <td> $KODPR </td>
          <td> $KODTM </td>
          <td> $KODTP </td>
          <td> $CINA_OD </td>
       </tr>";
}
echo "</table>";
echo "<P>   </P>";

/*
----------------mysqli_fetch_object----------------
*/

$query = "select * from goods_realization";
$obj=mysqli_query($dbcon,$query);

if(!$obj) 
{
  echo "<P> Не вдалося встановити зв'язок з таблицею 'goods_realization' </P>";
  exit(mysqli_error());
}

echo "<P><B> Таблиця 'goods_realization' </B></P>";
echo "<table border=1>";
echo"<tr>
  <td><B>id</B></td>
  <td><B>KODPR</B></td>
  <td><B>KIL</B></td>
  <td><B>DATER</B></td>
  <td><B>DATESP</B></td>
</tr>";
while($rez=mysqli_fetch_object($obj))
{
  echo "<tr>
          <td> ".$rez->id." </td>
          <td> ".$rez->KODPR." </td>
          <td> ".$rez->KIL." </td>
          <td> ".$rez->DATER." </td>
          <td> ".$rez->DATESP." </td>
       </tr>";
}
echo "</table>";
?>


