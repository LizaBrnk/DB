<?php
include_once "config.php";

$kod = $_GET['code'];

$query = "select * from trademark_directory where KODTM= '$kod'";

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
<form action="update_trademark.php" style = "margin: 0px;">
    KODTM:<br>
    <input type="text" name="code_trademark" value="<?php echo $rez[0];?>" readonly><br>
    NAMETM:<br>
    <input type="text" name="name_trademark" value="<?php echo $rez[1];?>"><br>
    <input type="submit" value="Change" style = "margin: 10px; width:80px; margin-left: 0px; margin-bottom: 0px;">
</form>
<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>
</html>