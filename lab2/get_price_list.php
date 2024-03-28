<?php
include_once "config.php";

$kod = $_GET['code'];

$query = "select * from price_list where KODPR= '$kod'";

try 
{
    $ver=mysqli_query($dbcon,$query);
    $rez=mysqli_fetch_array($ver,MYSQLI_BOTH);
}
catch (Exception $e) 
{
    echo "<P>Error</P>";
    echo $e -> getMessage();
    echo "<br>";
    echo '<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>';
    exit();
}

if ($rez==null){
    echo "Error. This ID wasn't found.<br>";
    echo '<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>';
    exit();
}

?>

<html>
<form action="update_price_list.php" style = "margin: 0px;">
    KODPR:<br>
    <input type="text" name="codepr_price_list" value="<?php echo $rez[0];?>" readonly><br>
    KODTM:<br>
    <input type="text" name="codetm_price_list" value="<?php echo $rez[1];?>"><br>
    KODTP:<br>
    <input type="text" name="codetp_price_list" value="<?php echo $rez[2];?>"><br>
    CINA_OD:<br>
    <input type="text" name="cina_price_list" value="<?php echo $rez[3];?>"><br>
    <input type="submit" value="Change" style = "margin: 10px; width:80px; margin-left: 0px; margin-bottom: 0px;">
</form>
<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>
</html>