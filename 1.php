<form action="m.php">
  <input type="submit" value="Назад"><br><br>
</form>

<?php
include "conf.php";

    // Виконання першого запиту
    $query = "call pr1('$nazava_firm')";
    $ver = mysqli_query($dbcon, $query);
    if(!$ver) {
        echo "<P> Не вдалося виконати запит </P>";
        exit(mysqli_error($dbcon));
    }

    // Виведення результатів першого запиту
    echo "<P><B> Результат запиту<br><br>";
    echo "<table border=1>";
    echo "<tr>
            <td> Номер замовлення </td>
            <td> Назва товару </td>
            <td> Назва фірми </td>
            <td> Кількість </td>
            <td> Ціна </td>
            <td> Вартість </td>
         </tr>";
    while(list($num_zamovlena, $name_tovary, $name_dist, $kil, $cina, $vartist) = mysqli_fetch_row($ver)) {
        echo "<tr>
                <td> $num_zamovlena </td>
                <td> $name_tovary </td>
                <td> $name_firm </td>
                <td> $kil </td>
                <td> $cina </td>
                <td> $vartist </td>
             </tr>";
    }
    echo "</table>";
    echo "<P>   </P>";

?>
