<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="save.php" method="post">
        <!-- Подписываем с помощью label нижний input, в поле for указываем, к чему подпись относится. -->
        <label for="email">Email: </label>
        <!-- name - ключ массива -->
        <input type="email" name="email" required>
        <label for="category">Category: </label>
        <!-- required - в при отправке формы не даст оставить данное поле пустым -->
        <select name="category" required>
            <?php
                // указываем путь до папки
                $folders = "categories";
                // помещаем имена всех папок в папке categories
                $categories = scandir($folders);
                foreach($categories as $category) {
                    // так как в каталоге всегда будет содержаться ссылка на данную папку - .
                    // ссылка на папку выше - ..
                    if (($category != '.') && ($category != "..")) {
                        echo "<option value=".$category.'>'.$category."</option>";
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
</body>
</html>