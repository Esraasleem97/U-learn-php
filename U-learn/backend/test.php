<?php

$array = array("blue","green","green","White","blue","White","White","Pink");

$count = array();
foreach ($array as $a) {

     @$count[$a]++;

}
print_r($count);


?>