<?php

$dbhost  = "localhost";
$dbuser  = "root";
$dbpass  = "";
$dbtable = "adamhosting";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbtable);

if(mysqli_connect_errno())
{
    echo 'Koneksi Gagal : ' . mysqli_connect_error();
}