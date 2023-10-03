<?php

// 1 行目には、ボードの横の長さを表す整数 N が入力されます。
// 1 ≦ n ≦ 100
do {
    print_r("Nを入力してください。: ");
    $n = trim(fgets(STDIN));
} while ($n < 1 || $n > 100);


// s は英字小文字 "b", "w" で構成される文字列
// (s の長さ) = n
$pattern = "/^[b,w]{" . $n . "}$/";
do {
    print_r("sを入力してください。: ");
    $s = trim(fgets(STDIN));
} while (!preg_match($pattern, $s));


$aryStr = str_split($s);
$omote = "b";
$ura = "w";

function turn(&$aryStr, $firstC, $lastC, $start, $last)
{
    if ($start > $last) {
        return;
    }
    for ($coin = $start; $coin <= $last; $coin++) {
        if ($aryStr[$coin] == $firstC) {
            $aryStr[$coin] = $lastC;
        } else {
            $aryStr[$coin] = $firstC;
        }
    }
    $start = array_search($lastC, $aryStr);
    $last = array_search($firstC, array_reverse($aryStr));
    turn($aryStr, $firstC, $lastC, $start, $last);
}

if ($aryStr[0] == $ura && $aryStr[$n - 1] == $ura) {
    echo 0 . "\n";
} elseif ($aryStr[0] == $omote && $aryStr[$n - 1] == $omote) {
    echo $n . "\n";
} else {
    if ($aryStr[0] == $ura) {
        $start = array_search($omote, $aryStr);
        $last = array_search($ura, array_reverse($aryStr));
        turn($aryStr, $ura, $omote, $start, $last);
        echo count(array_filter($aryStr, function ($c) use ($omote) {
            return $c == $omote;
        })) . "\n";
    } else {
        $start = array_search($ura, $aryStr);
        $last = array_search($omote, array_reverse($aryStr));
        turn($aryStr, $omote, $ura, $start, $last);
        echo count(array_filter($aryStr, function ($c) use ($omote) {
            return $c == $omote;
        })) . "\n";
    }
}
