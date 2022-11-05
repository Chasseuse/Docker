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

$email = $_POST['email'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];

// пропишем сначала путь до папки, так как папка может быть ещё не создана и выскочет ошибка
$folderPath = "categories/{$category}/{$email}";
// проверяем существует ли такая папка
if (false === file_exists($folderPath)) {
    // создаём папку со всеми правами доступа
    mkdir("categories/{$category}/{$email}", 0777);
}
/**
 * сначала идёт название папки, в которой всё это лежит
 * "" - чтобы использовать переменные
 * затем сама выбранная папка из categories
 */
$filePath = "categories/{$category}/{$email}/{$title}.txt";
/**
 * Принимает на вход:
 * 1. имя файла (путь к файлу),
 * 2. содержимое файла.
 * Возвращает: либо int - сколько строк было добавлено, либо false - если не получилось ничего добавить.
 * ===, а не ==, потому что может вернуть 0, а 0 это не будет ошибкой, в отличие от false.
 * Обрабатываем случай, когда что-то идёт не так.
 */
if (false === file_put_contents($filePath, $description)) {
    throw new Exception('Something went wrong');
}

redirectToHome();