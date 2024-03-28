<?php
if (isset($_POST['table'])) { 
    $selectedTable = $_POST['table']; 
    include_once "config.php";

    $query = "SELECT * FROM $selectedTable";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "<h3>Результати запиту для таблиці \"$selectedTable\":</h3>";
        echo "<table border='1'>";
        // Отримуємо назви полів таблиці
        $fields = mysqli_fetch_fields($result);
        echo "<tr>";
        foreach ($fields as $field) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Помилка у запиті: " . mysqli_error($dbcon);
    }
}
?>