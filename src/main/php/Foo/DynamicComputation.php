<?php

$val1 = $_GET['val1'];
$val2 = $_GET['val2'];

$res = eval($val1 + $val2);

echo "Val1({$val1}) + Val2({$val2}) = {$res}";

?>
