<?php
//print_r($_POST); die;
include('connA.php');
if($_POST){	
	$_SESSION['counter'] +=  1;
	$data = $_SESSION['counter'];
}

foreach($_POST as $key=>$val){
	$_SESSION['product'][$data][$key]  = $val;
}

/* Try this with cookies
if($_POST){	echo $data = count($_COOKIE['product']);}

foreach($_POST as $key=>$val){
	setcookie("product[".$data."][".$key."]", $val , time()+3600);
}
*/

?>