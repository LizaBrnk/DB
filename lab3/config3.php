<form action="config3.php" method="post">
    <style>
        body {
            margin: 25px 0 0 0;
            text-align: center;
        }
        h1 {
            margin: 25px auto;
            text-align: center;
            font-size: 40px;
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
            display: block; 
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
            text-align: center;
            font-size: 25px;
        }
    </style>

    <h1>Вхід</h1>
    <input type="text" name="name" placeholder="Ім'я">
    <input type="password" name="pass" placeholder="Пароль">
    <input type="submit" class="button" value="Увійти">
    <div class="register">Потрібна реєстрація? <a href="register.php">Зареєструватися</a></div>
</form>

<?php
    include "config.php";
    $query = "select USER_HASH from users where USER_NAME='$_POST[name]'";
    $ver=mysqli_query($dbcon,$query);
    $rez=mysqli_fetch_row($ver);
    if(isset($rez[0]) && password_verify($_POST['pass'], $rez[0]))
    {
        echo "<P> Верифікація пройдена </P>";
        $query = "select * from users";
        $ver=mysqli_query($dbcon,$query);
        while($rez=mysqli_fetch_array($ver,MYSQLI_BOTH))
        {
            if($_POST['name'] == $rez[1] && $_POST['pass'] == $rez[2])
            {
                echo "<P> Ім'я користувача - $rez[1].</P>";
                echo "<P> Email користувача - $rez[6]</P>";
                echo "<P> Телефон користувача - $rez[8]</P>";
                if( $rez[7] != null)
                    echo "<P> URL користувача - $rez[7]</P>";
            }
        }
        mysqli_close($dbcon);
        // Перенаправлення на сторінку доступу після успішної верифікації
        header("Location: access.php");
        exit();
    }
    else
    {
        exit("<P> Верифікація не пройдена </P>");
    }
?>

