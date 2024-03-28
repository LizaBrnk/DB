<?php
include_once "config.php";

$kod = $_GET['code_trademark'];
$name = $_GET['name_trademark'];

$query = "UPDATE `trademark_directory` SET `NAMETM` = '$name' WHERE `trademark_directory`.`KODTM` = $kod";

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
}
?>
<form method="post" action="interface.php">
<input type="submit" value="Back">
</form>