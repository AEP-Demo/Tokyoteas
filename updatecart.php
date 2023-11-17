<?php
//print_r($_POST); die;
include('connA.php');

$_SESSION['product'][$_GET['k']]['product_quantity'] = $_GET['v'];
/* Try this with cookies
if($_POST){	echo $data = count($_COOKIE['product']);}

foreach($_POST as $key=>$val){
	setcookie("product[".$data."][".$key."]", $val , time()+3600);
}
*/

?>