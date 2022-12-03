<?php
    # создаём подключение
    # 'db' - имя контейнера, 'root' - указали MYSQL_ROOT_PASSWORD в docker-compose.yml
    # 'helloworld' - пароль, который указан там же, 'web' - имя БД (create database web)
    $mysqli = new mysqli('db', 'root', 'helloworld', 'web');

    # подключаемся к БД
    # функция mysqli_connect_errno - возвращает номер ошибки
    if (mysqli_connect_errno()) {
        printf('Can not connect to mysql server. Error code: %s', mysqli_connect_error());
        # выходим из приложения
        exit;
    }

    # изначально есть категории, которые хранятся уже в таблице categories, добавляем их
    #$mysqli->query('INSERT INTO categories (category) VALUES ("cars")');
    #$mysqli->query('INSERT INTO categories (category) VALUES ("other")');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="form">
        <form action="save.php" method="post">
            <!-- Подписываем с помощью label нижний input, в поле for указываем, к чему подпись относится. -->
            <label for="email">Email: </label>
            <!-- name - ключ массива -->
            <input type="email" name="email" required>
            <label for="category">Category: </label>
            <!-- required - в при отправке формы не даст оставить данное поле пустым -->
            <select name="category" required>
                <?php
                    if ($result = $mysqli->query('SELECT * from categories')) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['category'].'>'.$row['category']."</option>";
                        }
                    }
                ?>
            </select>
            <label for="title">Title: </label>
            <input type="text" name="title" required>
            <label for="description">Description: </label>
            <textarea rows='3' name="description"></textarea>
            <input type="submit" value="Save">
        </form>
    </div>
    <div id="table">
        <!-- Таблица -->
        <table>
            <!-- Заголовок -->
            <thead>
                <th>Category</th>
                <th>Email</th>
                <th>Title</th>
                <th>Description</th>
            </thead>
            <!-- здесь идут строки -->
            <tbody>
                <!-- Каждая строка - tr -->
                <!-- У каждой строки есть td -->
                <?php
                    # считываем данные из БД
                    if ($result = $mysqli->query('SELECT * from ad')) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['category']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['title']}</td>";
                            echo "<td>{$row['description']}</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>