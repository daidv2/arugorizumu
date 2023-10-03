<?php

// ある時刻と、時間の範囲(開始時刻と終了時刻)を受け取る。
do {
    print_r("0時から23時までのある時刻を指定してください : ");
    $time = trim(fgets(STDIN));
} while ($time < 0 || $time > 23);

do {
    print_r("開始時刻を指定してください : ");
    $startTime = trim(fgets(STDIN));
} while ($startTime < 0 || $startTime > 23);

do {
    print_r("終了時刻を指定してください : ");
    $endTime = trim(fgets(STDIN));
} while ($endTime < 0 || $endTime > 23);

// ある時刻(0時～23時)が、指定した時間の範囲内に含まれるかどうかを調べる
if ($startTime <= $endTime) {
    if ($time >= $startTime && $time <= $endTime) {
        print_r("\n{$time}時は{$startTime}時から{$endTime}時までに含まれます。");
    } else {
        print_r("\n{$time}時は{$startTime}時から{$endTime}時までに含まれません。");
    }
} else {
    if ($time >= $startTime || ($time < $startTime && $time < $endTime)) {
        print_r("\n{$time}時は{$startTime}時から{$endTime}時までに含まれます。");
    } else {
        print_r("\n{$time}時は{$startTime}時から{$endTime}時までに含まれません。");
    }
}
