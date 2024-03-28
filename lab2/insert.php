<?php
include_once "config.php";

// Логіка для вставки даних
if(isset($_POST['table'])) {
    $selectedTable = $_POST['table'];
    // Отримання структури таблиці
    $tableStructure = getTableStructure($selectedTable, $dbcon);

    // Перевірка, чи введені дані для вставки
    if(isset($_POST['insert_data'])) {
        $insertValues = array();
        foreach ($tableStructure as $field) {
            $fieldName = strtolower($field['name']); // В нижньому регістрі
            if(isset($_POST[$fieldName])) {
                $insertValues[$fieldName] = $_POST[$fieldName];
            }
        }

        // Формування запиту для вставки даних
        $fields = implode(", ", array_keys($insertValues));
        $values = "'" . implode("', '", $insertValues) . "'";
        $query = "INSERT INTO $selectedTable ($fields) VALUES ($values)";

        // Виконання запиту на вставку даних
        $result = mysqli_query($dbcon, $query);

        if ($result) {
            echo "<p>Дані успішно вставлено!</p>";
        } else {
            echo "<p>Помилка при вставці даних: " . mysqli_error($dbcon) . "</p>";
        }
    }

    // Виведення форми для введення даних
    echo '<form method="post" action="insert.php">';
    echo '<input type="hidden" name="table" value="' . $selectedTable . '">';
    foreach ($tableStructure as $field) {
        echo '<label for="' . $field['name'] . '">' . $field['name'] . ': </label>';
        echo '<input type="text" name="' . strtolower($field['name']) . '" id="' . $field['name'] . '"><br>'; // У нижньому регістрі
    }
    echo '<input type="submit" name="insert_data" value="Insert Data">';
    echo '</form>';

    // Форма для повернення назад до інтерфейсу
    echo '<form method="post" action="interface.php">';
    echo '<input type="submit" value="Назад">';
    echo '</form>';
}

// Функція для отримання структури таблиці
function getTableStructure($tableName, $dbcon) {
    $query = "DESCRIBE $tableName";
    $result = mysqli_query($dbcon, $query);
    $tableStructure = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tableStructure[] = array(
                'name' => $row['Field'],
                'type' => $row['Type'],
            );
        }
    } else {
        echo "Error in query: " . mysqli_error($dbcon);
    }
    return $tableStructure;
}
?>
