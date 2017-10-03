<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db_sijamu';

$connect = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if($connect -> connect_error) {
	die('Koneksi gagal: '.$connect->connect_error);
}

?>