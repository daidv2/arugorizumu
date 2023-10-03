<?php

$aryX = array();

// 入力されるクレジットカードの総数
// 1 ≦ n ≦ 100
do {
    print_r("nを入力してください。: ");
    $n = trim(fgets(STDIN));
} while ($n < 1 || $n > 100);

$no = 0;
while ($no++ < $n) {
    // クレジットカード番号バリデーションチェック
    // a_i (1 ≦ i ≦ n) は長さ16の文字列です。
    // 1文字目から15文字目は0から9までのいずれかの数字が書かれており、
    // 16文字目はX (アルファベット大文字のエックス) が書かれています。
    $pattern = "/^[0-9]{15}[X]{1}$/";
    do {
        print_r("#{$no}番目のクレジットカード番号を入力してください。: ");
        $cardNumber = trim(fgets(STDIN));
    } while (!preg_match($pattern, $cardNumber));

    $sum = 0;
    $aryNumber = str_split($cardNumber);
    for ($i = 0; $i < 15; $i++) {
        if ($i % 2 == 0) {
            $num = $aryNumber[$i] * 2;
            if (strlen($num) == 2) {
                list($digit1, $digit2) = str_split($num);
                $num = $digit1 + $digit2;
            }
        } else {
            $num = $aryNumber[$i];
        }
        $sum += $num;
    }
    $aryX[] = (10 - $sum % 10) % 10;
}

// 出力表示
if (!empty($aryX)) {
    print_r("\n出力\n");
    print_r(implode("\n", $aryX));
}
