<?php

$fh = fopen(__DIR__ .'/tester.txt','r');
  $newarr=[];
while ($line = fgets($fh)) {
  
  

 
   $ggg=explode(", ",$line);

array_push($newarr,$ggg);
 

  

    
}




$hhh=[];
foreach (array_filter($newarr) as $key => $value) {

array_push($hhh,explode(" - ",$value[0]));
}

$gggj=[];


foreach ($hhh as $key => $ef) {

  echo "<pre>";
  echo "'";
echo "".$ef[0]."=>"."".$ef[1]."";
;
echo "</pre>"; 
 
}

fclose($fh);
?>