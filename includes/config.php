<?php session_start();

date_default_timezone_set('Pacific/Auckland');

require 'includes/functions.php';

// LOCAL
// 
$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'wrwfinal';


// PRODUCTION
// 
// $host = 'sql308.host.org.nz';
// $user = 'hostnz_20050733';
// $pass = 'password1';
// $database = 'hostnz_20050733_cat';


$dbh = connectDatabase($host,$database,$user,$pass);
$listings = getlistings($dbh);