<?php


$s = "Teagasc Skibereen - Construction of new entrance lobby and associated works";
$ss = explode(" ", $s);
$res = array();
foreach($ss as $x) {
    if (strpos($x, "C") > -1) {
        array_push($res, $x);
    }
}
print_r($res);
?> 