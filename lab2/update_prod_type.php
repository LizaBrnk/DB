<?php
include_once "config.php";

$kod = $_GET['code_prod'];
$name = $_GET['name_prod'];

$query = "UPDATE `product_type_dyrectory` SET `NAMETP` = '$name' WHERE `product_type_dyrectory`.`KODTP` = $kod";

try 
{
    $ver = mysqli_query($dbcon, $query);
} 
catch (Exception $e)
{
    echo "<P>Error</P>";
    echo $e -> getMessage();
    echo "<br>";
}

if ($ver){ echo 'Values changed ';
    echo '<form method="post" action="interface.php">';
    echo '<input type="submit" value="Back">';
    echo '</form>';
}
?>

