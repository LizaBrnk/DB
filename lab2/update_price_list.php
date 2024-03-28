<?php
include_once "config.php";

$kod = $_GET['codepr_price_list'];
$name = $_GET['codetm_price_list'];
$codetp = $_GET['codetp_price_list'];
$cina = $_GET['cina_price_list'];

$query = "UPDATE `price_list` SET `KODTM`= '$name', `KODTP`= '$codetp', `CINA_OD` = '$cina' WHERE `price_list`.`KODPR` = $kod";

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
<input type="submit" value="Назад">
</form>