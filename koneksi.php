<?php

$servername = 'localhost';
$username   = '';
$password   = '';
$dbname     = 'naivebayes';
$koneksi    = mysqli_connect($servername,$username,$password,$dbname);

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

?>