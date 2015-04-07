<?php
session_start();


$dsn = 'mysql:dbname=honour;host=127.0.0.1';
$user = 'root';
$password = '';

/* Connect to an ODBC database using driver invocation */
/*$dsn = 'mysql:dbname=i261975_db;host=127.0.0.1';
$user = 'i261975_db';
$password = 'Fapgegdink5';*/

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>