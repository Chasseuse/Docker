<?php
session_start();
echo 'Перейдите на страницу http://php-docker.local:8080/save.php';
if(!empty($_GET)) {
    $_SESSION['surname'] = $_GET['surname'];
    $_SESSION['name'] = $_GET['name'];
    $_SESSION['age'] = $_GET['age'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>lab3</title>
    </head>
    <body>
        <form method="GET">
            <input name="surname" placeholder="Введите фамилию..." required>
            <input name="name" placeholder="Введите имя..." required>
            <input name="age" placeholder="Введите возраст..." type="number" required>
            <input type="submit">
        </form>
    </body>
</html>