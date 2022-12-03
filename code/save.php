<?php
function redirectToHome(): void {
    // возвращаемся обратно на страницу index.php
    header('Location: /');
    // после header должно всегда идти exit 
    exit();
}
// проверяем, есть ли вообще данные, проверяем все поля
// _POST - глобальный массив
// в функцию isset можно передавать параметры через запятую (все будут проверяться)
// так, будто каждое значение по отдельности попадает в isset
if(false === isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description'])) {
    redirectToHome();
}

// записали данные в переменные
$email = $_POST['email'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];

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
// запишем теперь полученные данные в таблицу ad
$query = "INSERT INTO ad (email, title, description, category) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssss", $email, $title, $description, $category);
$stmt->execute();

redirectToHome();