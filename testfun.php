<?php

$glo=gmdate("Y-m-d H:i:s");

echo date('Y-m-d H:i:s',strtotime("Sat Aug 14 16:59:40 +0000 2021"));


SELECT STR_TO_DATE("Sat Aug 14 16:59:40 +0000 2021", "%W %M %d %H:%i:%s %Y") FROM ga_ctf_tweets


STR_TO_DATE("Sat Aug 14 16:59:40 +0000 2021", "%a %b %d %T +0000 %Y")
?> 