<form action="m.php">
  <input type="submit" value="Назад"><br><br>
</form>

<?php
include "conf.php";
echo "<form action='3.php' method=GET>";

echo "3.  Створити запит на зовнішнє об’єднання, який повинен містити товари, 
які не замовляла фірма ТОВ 'Impression'.";
echo "<br><br>";

$query = "call pr3()";
$ver = mysqli_query($dbcon, $query);
if(!$ver) {
    echo "<P> Не вдалося виконати запит </P>";
    exit(mysqli_error($dbcon));
}

// Виведення результатів запиту
echo "<P><B> Результат запиту<br><br>";
echo "<table border=1>";
echo "<tr><td>Товари</td></tr>";
while(list($kod_tovary) = mysqli_fetch_row($ver)) {
    echo "<tr><td>$kod_tovary</td></tr>";
}
echo "</table>";
echo "<P>   </P>";
?>

