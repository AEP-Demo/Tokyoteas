<?php
ob_start();
session_start();

error_reporting(1);
//$con=mysqli_connect("localhost","root","","bannerpreviewdb");
//if (mysqli_connect_errno($con)){  echo "Failed to connect to MySQL: " . mysqli_connect_error();  }
$hostName = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['HTTP_HOST'].'/tea/';
//echo"<br/>". 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

?>