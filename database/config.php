<?php
// error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
@session_start();

$host = 'localhost';
$user = 'root';
$pass =  '';
$db   = 'db_goaltrack';

$conn = mysqli_connect($host, $user, $pass);
mysqli_select_db($conn, $db);
if(!$conn)
{
	die("Connection Error".mysqli_error($con));
}
mysqli_set_charset($conn, "utf8");

include_once("constants.php");
include_once("functions.php");

?>