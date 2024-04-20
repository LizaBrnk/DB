<!DOCTYPE html>
<html>
<head>
    <title>Вхід або реєстрація</title>
    <style>
        body {
            margin: 25px 0 0 0;
            text-align: center;
        }
        input[type="submit"] {
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
            cursor: pointer;
        }
        input[type="submit"]:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .button {
            background-color: blue;
            color: white;
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
</head>
<body>
    <h2>Виберіть дію:</h2>
    <form action="start.php" method="post">
        <input type="submit" class="button" name="login" value="Увійти">
        <input type="submit" class="button" name="register" value="Зареєструватися">
    </form>
</body>
</html>

<?php
// Логіка обробки вибору користувача
if(isset($_POST['login'])) {
    header("Location: config3.php"); // Перенаправлення на сторінку входу
    exit();
} elseif(isset($_POST['register'])) {
    header("Location: bd3.php"); // Перенаправлення на сторінку реєстрації
    exit();
}
?>
