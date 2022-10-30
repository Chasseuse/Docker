<?php
/* Imagine a lot of code here */
$very_bad_unclear_name = "15 chicken wings";

// Write your code here:
$order = & $very_bad_unclear_name;
$order = " Hello " . $order;

// Don't change the line below
echo "\nYour order is: $very_bad_unclear_name.";

echo "<br>";

$number = 1;
echo $number;

echo "<br>";

$irr = 1.1;
echo $irr;

echo "<br>";

echo 12;

echo "<br>";

echo 1 + 11;

echo "<br>";

$last_month = 1187.23;
$this_month = 1089.98;
echo $last_month - $this_month;

echo "<br>";

$num_languages = 4;
$months = 11;
$days = $months * 16;
$days_per_language = $days / $num_languages;
echo $days_per_language;

echo "<br>";

echo 8 ** 2;

echo "<br>";

$my_num = 2;
$answer = $my_num;
$answer += 2;
$answer *= 2;
$answer -= 2;
$answer /= 2;
$answer -= $my_num;
echo $answer;

echo "<br>";

$a = 10;
$b = 3;
echo ($a % $b);

echo "<br>";

$b = 5;

if (($a % $b) == 0)
    echo 'Делится ' . ($a / $b);
else
    echo 'Делится с остатком ' . ($a % $b);

echo "<br>";

$st = pow(2, 10);
echo $st;

echo "<br>";

echo sqrt(245);

echo "<br>";

$arr = [4, 2, 5, 19, 0, 10];
$sum_arr = 0;
foreach ($arr as &$value) {
    $sum_arr += pow($value, 2);
}
$res = sqrt($sum_arr);
echo $res;

echo "<br>";

echo round(sqrt(379), 0);
echo "<br>";
echo round(sqrt(379), 1);
echo "<br>";
echo round(sqrt(379), 2);
echo "<br>";

$square1 = sqrt(587);
$round_max = ceil($square1);
$round_min = floor($square1);
$arr1 = ['ceil' => $round_max, 'floor' => $round_min];
print_r($arr1);

echo "<br>";

$arr2 = [4, -2, 5, 19, -130, 0, 10];
echo min($arr2) . " " . max($arr2);

echo "<br>";

$random = rand(1, 100);
echo $random;

echo "<br>";

$arr3 = [];
for ($i = 1; $i <= 10; $i++) {
    $arr3[$i] = rand();
}
print_r ($arr3);

echo "<br>";

$a = 1;
$b = 2;
echo abs($a - $b);

echo "<br>";

$a = 2;
$b = 1;
echo abs($a - $b);

echo "<br>";

$a = -1;
$b = 1;
echo abs($a - $b);

echo "<br>";

$a = 1;
$b = -1;
echo abs($a - $b);

echo "<br>";

$a = -1;
$b = -2;
echo abs($a - $b);

echo "<br>";

$arr4 = [1, 2, -1, -2, 3, -3];
foreach ($arr4 as &$value) {
    $value = abs($value);
}
print_r ($arr4);

echo "<br>";

$number = 30;
$arr_del = [];

for ($i = 1; $i <= $number; $i++) {
    if ($number % $i == 0)
        array_push($arr_del, $i);
}

print_r($arr_del);

echo "<br>";

$arr5 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$sum = 0;
$i = 0;

while ($sum <= 10) {
    $sum += $arr5[$i];
    $i++;
}

echo $i;

echo "<br>";

function printStringReturnNumber($string)
{
    $number = 1;
    echo $string;
    echo "<br>";
    return $number;
}

$string = "Hello";
$my_num = printStringReturnNumber($string);
echo $my_num;

echo "<br>";

function increaseEnthusiasm($string) {
    return $string . "!";
}

echo increaseEnthusiasm("Hello");

echo "<br>";

function repeatThreeTimes($string) {
    return $string . $string . $string;
}

echo repeatThreeTimes("Hello");

echo "<br>";

echo increaseEnthusiasm(repeatThreeTimes("Hello"));

echo "<br>";

function cut($string, $count = 10) {
    return substr($string, 0, $count);
}

echo cut('Hello', 1);
echo "<br>";
echo cut('Hello');

echo "<br>";

function P_rint($arr, $i, $n) {
    if ($i >= $n)
        return;
    echo $arr[$i] . ' ';
    P_rint($arr, $i + 1, $n);
}

$arr5 = [1, 2, 3];

P_rint($arr5, 0, count($arr));

echo "<br>";

function sum_Number($n) {
    $arr = str_split($n);
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $sum += $arr[$i];
    }
    if ($sum <= 9)
        echo $sum;
    else
        sum_Number($sum);
}

$number = 1234;

sum_Number($number);

echo "<br>";

$arr6 = [];
$n = 10;
$string = '';
for ($i = 1; $i <= $n; $i++) {
    $string .= 'x';
    $arr6[] = $string;
}
print_r($arr6);

echo "<br>";

function arrayFill($letter, $n)
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = $letter;
    }
    return $arr;
}

print_r(arrayFill("a", 3));

echo "<br>";

$arr_2_dim = [[[1, 2, 3], [4, 5], [6]]];
$sum = 0;

for ($row = 0; $row < sizeof($arr_2_dim); $row++)
    for ($subarr = 0; $subarr < sizeof($arr_2_dim[$row]); $subarr++) 
        for ($i = 0; $i < sizeof($arr_2_dim[$row][$subarr]); $i++)
            $sum += $arr_2_dim[$row][$subarr][$i];
echo $sum;

echo "<br>";

$arr8 = [];
for ($subarr = 0; $subarr < 3; $subarr++) 
    for ($i = 0; $i < 3; $i++) {
        if ($subarr == 0)
            $arr8[$subarr][$i] = $subarr + $i + 1;
        if ($subarr == 1)
            $arr8[$subarr][$i] = $subarr + $i + 3;
        if ($subarr == 2)
            $arr8[$subarr][$i] = $subarr + $i + 5;
    }
print_r($arr8);

echo "<br>";

$arr8 = [2, 5, 3, 9];
$result = $arr8[0] * $arr8[1] + $arr8[2] * $arr8[3];
echo $result;

echo "<br>";

$user = ["name" => "Name", "surname" => "Surname", "patronymic" => "Patronymic"];
echo $user["name"] . " " . $user["surname"] . " " . $user["patronymic"];

echo "<br>";

$date = ["year" => "2022", "month" => "october", "day" => "29"];
echo $date["year"] . "-" . $date["month"] . "-" . $date["day"];

echo "<br>";

$arr9 = ['a', 'b', 'c', 'd', 'e'];
echo count($arr9);

echo "<br>";

echo $arr9[sizeof($arr9) - 1];


echo "<br>";

echo $arr9[sizeof($arr9) - 2];

echo "<br>";

function func($x, $y) {
    if ($x + $y > 10)
        return "true";
    else
        return "false";
}

echo func(2, 1);
echo "<br>";
echo func(20, 1);

echo "<br>";

function func_1($x, $y) {
    if ($x == $y)
        return "true";
    else
        return "false";
}

echo func_1(1, 1);
echo "<br>";
echo func_1(2, 1);

echo "<br>";

$test = 0;
echo $test == 0 ? 'верно' : '';

echo "<br>";

function sumNumber($n) {
    $arr = str_split($n);
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $sum += $arr[$i];
    }
    return $sum;
}

$age = 11;

if ($age < 10 || $age > 99)
    echo "Число меньше 10 и больше 99.";
else if ($age >= 10 && $age <= 99)
{
    echo sumNumber($age);
    echo "<br>";
    if (sumNumber($age) <= 9)
        echo "Cумма цифр однозначна.";
    else 
        echo "Cумма цифр двузначна.";
}

echo "<br>";

$arr = [1, 2, 3];
if (count($arr) == 3)
    echo array_sum($arr);



