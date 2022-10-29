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

// второе задание
$arr5 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$sum = 0;
$i = 0;

while ($sum <= 10) {
    $sum += $arr5[$i];
    $i++;
}

echo $i;

echo "<br>";