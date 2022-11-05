<!DOCTYPE html>
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
                    foreach($categories as $category) {
                        if (($category === '.') || ($category === '..')) {
                            continue;
                        }
                        // указываем путь до категории
                        $categoryPath = "categories/{$category}";
                        /**
                         * В каждой категории будет содержаться ещё папка с email-ами, их тоже будет
                         * необходимо каждую прошерстить. Получаем список папок-email-ов в каждой категории.
                         */
                        $emailsInCategory = scandir($categoryPath);
                        // проходимся по каждому email-у в папке
                        foreach($emailsInCategory as $email) {
                            if (($email === '.') || ($email === '..')) {
                                continue;
                            }
                            /**
                             * теперь необходимо посмотреть все файлы в папке email
                             * путь до папки, в которой сейчас находимся
                             */
                            $emailFolder = "categories/{$category}/{$email}";
                            // получаем список всех файлов, которые находятся в папке конкретного email
                            $advertisements = scandir($emailFolder);
                            // проходимся теперь по всем файлам, относящимся к данному email
                            foreach($advertisements as $adv) {
                                if (($adv === '.') || ($adv === '..')) {
                                    continue;
                                }
                                // задаём путь до конкретного файла
                                $advPath = "categories/{$category}/{$email}/{$adv}";
                                /**
                                 * открываем файл, находящемуся по пути $advPath
                                 * 'r' - чтение файла
                                 */
                                $advFile = fopen($advPath, "r");
                                // получили содержимое файла
                                $descr = file_get_contents($advPath);
                                // закрываем файл
                                fclose($advFile);
                                // далее прописываем html-разметку
                                echo "<tr>";
                                echo "<td>{$category}</td>";
                                echo "<td>{$email}</td>";
                                // получаем подстроку, где удаляем в конце 4 элемента '.txt'
                                echo "<td>".substr($adv, 0, -4)."</td>";
                                echo "<td>{$descr}</td>";
                                echo "</tr>";
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>