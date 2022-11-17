<?php
// подключаем файлы
require __DIR__ . '/vendor/autoload.php';
// создаём нового гугл клиента
$client = new Google_Client();
$client->setApplicationName('Google Sheets in PHP');
// указываем клиенту, какой API будем пользоваться
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

// диапазон, который мы затронем
// напишем сначала наименование полей
$range = 'A1:D1';
$data = [
    [
        'Category',
        'Email',
        'Title',
        'Description'
    ]
];
$values = new Google_Service_Sheets_ValueRange([
    'values' => $data
]);

$options = [
    'valueInputOption' => 'RAW'
];
$spreadsheetId = '1NDvGt7__LafaThAvk5-PWdCYDh4UGaIk7d3ajcY3xTg';

$service->spreadsheets_values->update($spreadsheetId, $range, $values, $options);

// указываем путь до папки
$folders = "categories";
$categories = scandir($folders);
// строка, с которой начнём вносить данные
$num_str = 2;
// теперь проходимся по всем объявлениям в папках и дополняем таблицу в зависимости от данных
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
            // выписываем в каждую ячейку категорию, почту, название файла и содержимое файла
            $range = 'A'.$num_str.':D'.$num_str;
            // переходим на следующую строку
            $num_str = $num_str + 1;
            // данные, которые будем записывать в таблицу
            $data = [
                [
                    $category,
                    $email,
                    substr($adv, 0, -4),
                    $descr
                ]
            ];
            $values = new Google_Service_Sheets_ValueRange([
                'values' => $data
            ]);
            $service->spreadsheets_values->update($spreadsheetId, $range, $values, $options);
        }
    }
}
$num_str = $num_str - 1;
$range = 'A1:D'.$num_str;
// вытаскиваем данные с таблицы
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
var_dump($response->getValues());