<form method="post">
    <style>
        body {
            margin: 25px 0 0 0;
            text-align: center;
        }
        input {
            background-color: #aee4f2;
            text-align: center;
            width: 30%;
            height: 50px;
            margin: 0 auto 20px;
            padding: 10px 0;
            font-size: 25px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        input:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .button {
            background-color: blue;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: darkblue;
        }
        .register {
            font-size: 25px;
            margin-top: 20px;
        }
        .a {
            font-size: 25px;
            margin-left: 25px;
        }
        table {
            text-align: center;
            margin: 0 auto;
        }
    </style>
    <input type="text" name="name" placeholder="Ім'я">
    <br>
    <input type="password" name="pass" placeholder="Пароль">
    <br>
    <input type="password" name="pass_again" placeholder="Підтвердіть пароль">
    <br>
    <input type="text" name="email" placeholder="Email">
    <br>
    <input type="text" name="url" placeholder="URL">
    <br>
    <input type="text" name="tel" placeholder="Телефон">
    <br>
    <input type="submit" class="button" value="Реєстрація">
</form>

<?php
    session_start();
    if(empty ($_POST)) exit();
    $_POST['name']=trim($_POST['name']);
    $_POST['pass']=trim($_POST['pass']);
    $_POST['pass_again']=trim($_POST['pass_again']);

    if(empty ($_POST['name'])) exit('Поле "Ім\'я" не заповнено');
    if(empty ($_POST['pass'])) exit('Одне з полів "Пароль" не заповнено');
    if(!preg_match("|^[-0-9a-z_]{8,20}$|i",$_POST['pass']))
        exit('Поле "Пароль" заповнено не правильно');
    if(empty ($_POST['pass_again'])) exit('Одне з полів "Пароль" не заповнено');
    if($_POST['pass']!=$_POST['pass_again']) exit('Пароль та підтвердження не співпадають');
    if(empty ($_POST['email'])) exit('Поле "Email" не заповнено');
    if(!empty ($_POST['email']))
    {
        if(!preg_match("|^[-0-9a-z_]+@[-0-9a-z_]+\.[a-z]{2,6}$|i",$_POST['email'])) 
            exit('Поле "e-mail" повинно відповідати формату name@ukr.net');
    }
    if(empty ($_POST['tel'])) exit('Поле "Телефон" не заповнено');
    if(!empty ($_POST['tel']))
    {
        if(!preg_match("|^[0-9]{10}$|",$_POST['tel']))
            exit('Поле "Телефон" заповнено не правильно');
    }

    include ("config.php");

    $_POST['name']=mysqli_escape_string($dbcon,$_POST['name']);
    $_POST['pass']=mysqli_escape_string($dbcon,$_POST['pass']);
    $_POST['email']=mysqli_escape_string($dbcon,$_POST['email']);
    $_POST['url']=mysqli_escape_string($dbcon,$_POST['url']);

    $_SESSION['name']=$_POST['name'];
    $_SESSION['pass']=$_POST['pass'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['url']=$_POST['url'];
    $_SESSION['tel']=$_POST['tel'];

    include ("config2.php"); 
?>

<form method="post">
    <style>
        body {
            margin: 25px 0 0 0;
            text-align: center;
        }
        input 
        {
            background-color:#cfeecc;
            text-align: center;
            width: 30%;
            height: 50px;
            display: flex;
            justify-content: center;
            margin: 0px auto 20px;
            padding: 10px 0;
            font-size: 25px;
            }
        .button {
            background-color:blue;
        }
        .register {
            text-align: center;
            font-size: 25px;
        }
        .a
        {
            text-align: center;
            font-size: 25px;
            margin: 0 0 0 25px;
        }
        table
        {
            text-align: center;
            margin: 0px auto;
        }
    </style>
    <input type="text" name="name" placeholder="Ім'я">
    <input type="password" name="pass" placeholder="Пароль">
    <input type="password" name="pass_again" placeholder="Підтвердіть пароль">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="url" placeholder="URL">
    <input type="text" name="tel" placeholder="Телефон">
    <input type="submit" class="button" value="Реєстрація">
</form>
<?php
    session_start();
    if(empty ($_POST)) exit();
    $_POST['name']=trim($_POST['name']);
    $_POST['pass']=trim($_POST['pass']);
    $_POST['pass_again']=trim($_POST['pass_again']);

    // Логіка перевірки та збереження даних реєстрації

    // Якщо реєстрація успішна, перенаправлення на стартову сторінку
    header("Location: start.php");
    exit();
?>
