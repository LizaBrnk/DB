<form action="m.php">
  <input type="submit" value="Назад"><br><br>
</form>

<?php
include "conf.php";
echo "<form action='2.php' method=GET>";

echo "2.  Створити груповий запит, що виводить кількість замовлень між двома датами. 
Обидві дати повинні задаватися під час виконання запиту.";
echo "<br><br>";
echo "1 <br>";
echo " <input type='text' name='num1' value=''/><br/>";
echo "2 <br>";
echo " <input type='text' name='num2' value=''/><br/>";
echo "<input type='submit' value='Виконати'><br><br>";
echo "</form>";

if(isset($_GET['num1'])&&isset($_GET['num2'])){
    $query = "call pr2('$_GET[num1]','$_GET[num2]')";
    echo $query;
    $ver=mysqli_query($dbcon,$query);
    if(!$ver) 
    {
    echo "<P> Не вдалося виконати запит </P>";
    exit(mysqli_error($dbcon));
    }

    echo "<P><B> Результат запиту<br><br>";
    echo "<table border=1>";
      echo "<tr>
              <td> Кількість </td>
           </tr>";
    while(list($kil)=mysqli_fetch_row($ver))
    {
      echo "<tr>
              <td> $kil </td>
           </tr>";
    }
    
    echo "</table>";
    echo "<P>   </P>";
}

?>
