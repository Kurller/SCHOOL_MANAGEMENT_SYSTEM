<?php
$s = microtime(true);
$r = @fsockopen("mysql-ac83ff2-kolaquadry-e12b.f.aivencloud.com", 20198, $errno, $errstr, 5);
$t = microtime(true) - $s;
if ($r) {
    echo "Connected in {$t}s\n";
} else {
    echo "Failed: {$errstr} ({$errno}) after {$t}s\n";
}